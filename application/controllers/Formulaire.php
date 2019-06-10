<?php

class Formulaire extends CI_Controller {

	public function __construct(){
		parent::__construct();
       	$this->load->library('session');
		$this->load->model('formulaire_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
		
	}

	public function index (){
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['user'] = $this->session->userdata('user_session');

		$data['title'] = 'Formulaire';
		$this->session->set_userdata('cpt_question', 0);
		//start a cpt for a new form
		$this->form_validation->set_rules('titre', 'Titre', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header', $data);
			$this->load->view('formulaire/formulaire', $data);
			$this->load->view('footer', $data);
		}else {
			if ($this->formulaire_model->create_form()) {
				redirect('formulaire');
			} else {
				$data['error'] = 'Formulaire incorrect';
				$this->load->view('header', $data);
				$this->load->view('formulaire/formulaire', $data);
				$this->load->view('footer', $data);
		}
	}
}

	public function questionRep(){
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);
		$this->load->view('formulaire/template/questionRep', $data);
	}

	public function questionMulti(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);

		$this->form_validation->set_rules('text_quest', 'Question', 'required');
		$this->form_validation->set_rules('test_aide', 'Aide', 'required');

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

	private function decrementCptQuestion($current){
		$this->session->set_userdata('cpt_question', $current - 1);
	}

	public function recherche(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Recherche';
		$data['user'] = $this->session->userdata('user_session');
		$this->load->view('header', $data);
		$this->load->view('formulaire/recherche', $data);
		$this->load->view('footer', $data);
	}

	public function reponse(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Reponse';
		$data['user'] = $this->session->userdata('user_session');
		$this->load->view('header', $data);
		$this->load->view('formulaire/reponse', $data);
		$this->load->view('footer', $data);
	}
}