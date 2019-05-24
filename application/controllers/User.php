<?php

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
	}

	public function index() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Inscription';

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required|is_unique[user.pseudo]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/inscription', $data); 
		} else {
			$this->user_model->create_user();
			header('Location: compte');
		}
	}

	public function connexion(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Connexion';

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/connexion', $data); 
		} else {
			if ($this->user_model->connect()) {
				header('Location: compte');
			} else {
				$data['error'] = 'Email ou mot de passe incorrect';
				$this->load->view('user/connexion', $data); 
			}
		}

		$data['connexion'] = $this->user_model->get_user();
	}

	public function compte(){
		$data['compte'] = $this->user_model->get_user();
		$this->load->view('user/compte', $data); 
	}
 
}