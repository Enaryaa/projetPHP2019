<?php

class Formulaire extends CI_Controller {

	public function __construct(){
		parent::__construct();
       	$this->load->library('session');
		$this->load->helper('url');
		
	}

	public function index (){
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}
		$data['user'] = $this->session->userdata('user_session');

		$data['title'] = 'Formulaire';
		//start a cpt for a new form
		$this->session->set_userdata('cpt_question', 0);
		$this->load->view('formulaire/formulaire', $data);
	}

	public function questionRep(){
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);
		$this->load->view('formulaire/template/questionRep', $data);
	}

	public function questionMulti(){
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);
		$this->load->view('formulaire/template/questionMulti', $data);
	}

	private function getCptQuestion() {
		if (!$this->session->has_userdata('cpt_question')) {
			$this->session->set_userdata('cpt_question', 0);
		}
		return $this->session->userdata('cpt_question');
	}

	private function incrementeCptQuestion($current) {
		$this->session->set_userdata('cpt_question', $current + 1);
	}
}