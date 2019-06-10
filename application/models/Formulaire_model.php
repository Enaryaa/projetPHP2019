<?php

class Formulaire_model extends CI_Model {

	public function __construct() {
		$this->load->database();
       	$this->load->library('session');
	}

	public function create_form(){
		$this->load->helper('url');
		$this->load->helper('date');
		$now = date('Y-m-d H:i:s');
		$user = $this->session->userdata('user_session');
		$data = [
			'titre' => $this->input->post('titre'),
			'description' => $this->input->post('description'),
			'date' => $now,
			'user_id' => $user['user_id'],
			'form_key' => $this->random_key(20),
			'active' => 1
		];
		$result = $this->db->insert('formulaire', $data);
		if ($result) {
			$form = $this->get_form($data['form_key']);
			return $this->add_question($form); 
		} else {
			return false;
		}
	}

	public function modifier_active(){
		$key = $this->input->get('cle');
		$form = $this->get_form($key);
		if (empty($form)) {
			return;
		}
		if (intval($form['active'])) {
			$form['active'] = 0;
		}
		else {
			$form['active'] = 1;
		}
		
		$sql = "UPDATE formulaire SET active = ? WHERE form_key = ?";
		return $this->db->query($sql, array($form['active'], $form['form_key']));
	}

	public function get_form($key) {
		$sql = "SELECT * FROM formulaire WHERE form_key = ?";
		$query = $this->db->query($sql, $key);

		return $query->row_array();
	}

	public function get_forms_by_user($user_id) {
		$sql = "SELECT * FROM formulaire WHERE user_id = ?";
		$query = $this->db->query($sql, $user_id);

		return $query->result_array();
	}

	public function random_key($length=20){
	    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';
	    for($i=0; $i<$length; $i++){
	        $string .= $chars[rand(0, strlen($chars)-1)];
	    }
	    return $string;
	}

	public function add_reponse($responses, $questions, $form) {
		$repForInsert = [];
		foreach ($responses as $key => $reponseGroup) {
			foreach ($reponseGroup as $reponse) {
				$repForInsert[] = [
					'form_id' => $form['form_id'],
					'id_quest' => $questions[$key]['quest_id'],
					'text_reponse' => $reponse
				];
			}
		}
		return $this->db->insert_batch('reponsePossible', $repForInsert);
	}

	public function add_question($form){
		$this->load->helper('url');

		$data = $this->input->post('question');
		if (empty($data)) {
			return true;
		}
		//pour créer un formulaire vide

		$responses = [];

		foreach ($data as $key => $question) {
			$data[$key]['form_id'] = intval($form['form_id']);
			if (isset($question['requis'])) {
				$data[$key]['requis'] = 1;
			} else {
				$data[$key]['requis'] = 0;
			}

			if (isset($question['text_reponse'])) {
				$responses[$key] = $question['text_reponse'];
				unset($data[$key]['text_reponse']);
			}

		}

		$result = $this->db->insert_batch('question',$data);
		if ($result) {
			$questions = $this->get_question_by_form_id($form['form_id']);
			if (empty($responses)) {
				return true;
			}
			return $this->add_reponse($responses, $questions, $form);			
		} else {
			return false;
		}
	}

	public function get_question_by_form_id($id) {
		$sql = "SELECT * FROM question WHERE form_id = ?";
		$query = $this->db->query($sql, $id);

		return json_decode(json_encode($query->result()), true); 
		//ici on a un StrObject, c'est un hack pour le changer en array
	}


}