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
			'form_key' => $this->random_key(20)
		];
		$result = $this->db->insert('formulaire', $data);
		if ($result) {
			$form = $this->get_form($data);
			return $this->add_question($form); 
		} else {
			return false;
		}
	}

	public function get_form($data) {
		$sql = "SELECT * FROM formulaire WHERE form_key = ?";
		$query = $this->db->query($sql, $data['form_key']);

		return $query->row_array();
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