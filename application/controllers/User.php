<?php

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
       	$this->load->library('session');
	}

	/**
	 * pour créer une session $this-session->set_userdata(name, array)
	 * pour vérifier on fait $this->session->has_userdata(name)
	 * pour récupérer $this->session->userdata(name)
	 * pour supprimer la session on fait $this->session->unset_userdata(name)
	 *
	 */

	public function index() {
		//ici vérifier si il y a une session
		if ($this->session->has_userdata('user_session')) {
			redirect('compte');
		}		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Inscription';

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required|is_unique[user.pseudo]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/inscription', $data); 
		} else {
			if ($this->user_model->create_user()) {
				$this->user_model->set_session_user();
				redirect('compte');
			} else {
				$data['error'] = 'Email ou mot de passe incorrect';
				$this->load->view('user/inscription', $data); 
			}
		}
	}

	public function connexion() {
		//ici vérifier si il y a une session
		if ($this->session->has_userdata('user_session')) {
			redirect('compte');
		}	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Connexion';

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/connexion', $data); 
		} else {
			if ($this->user_model->connect()) {
				$this->user_model->set_session_user();
				redirect('compte');
			} else {
				$data['error'] = 'Email ou mot de passe incorrect';
				$this->load->view('user/connexion', $data); 
			}
		}
	}


	public function compte() {
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}	
		$data['title'] = 'Compte';
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordConf', 'Password Confirmation', 'required|matches[password]' );

		$data['user'] = $this->session->userdata('user_session');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header', $data);
			$this->load->view('user/compte', $data);
			$this->load->view('footer', $data); 
		} else {
			$this->user_model->update_password();
			$data['succes'] = 'mot de passe modifié';
			$this->load->view('header', $data);
			$this->load->view('user/compte', $data);
			$this->load->view('footer', $data); 
		}
		
	}

	public function delete(){
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}	
		$this->user_model->delete_user();
		$this->session->unset_userdata('user_session');
		$this->session->set_userdata('delete', true);
		redirect('home');
	}

	public function home(){
		if ($this->session->has_userdata('delete')) {
			$data['delete'] = 'L\'utilisateur a été supprimé';
			$this->session->unset_userdata('delete');
		}		
		$data['title'] = 'Home';

		if ($this->session->has_userdata('user_session')) {
			$data['user'] = $this->session->userdata('user_session');
		}	

		$this->load->view('header', $data);
		$this->load->view('user/home', $data);
		$this->load->view('footer', $data);
	}

	public function deco(){
		if ($this->session->has_userdata('user_session')) {
			$this->session->unset_userdata('user_session');
		}
		redirect('home');
	}
 
}