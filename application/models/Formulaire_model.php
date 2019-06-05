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
		return $this->db->insert('formulaire', $data);
	}

	public function random_key($length=20){
	    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';
	    for($i=0; $i<$length; $i++){
	        $string .= $chars[rand(0, strlen($chars)-1)];
	    }
	    return $string;
	}

}