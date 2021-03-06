<?php
class Reponse extends CI_Controller {
  public function __construct()
  {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('formulaire_model');
		$this->load->model('reponse_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
  }

  public function recherche()
  {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Recherche';
		if ($this->session->has_userdata('user_session')) {
			$data['user'] = $this->session->userdata('user_session');
		}

		if ($this->session->has_userdata('wrong_key')) {
			$data['wrong_key'] = $this->session->userdata('wrong_key');
			$this->session->unset_userdata('wrong_key');
		}

		$this->load->view('header', $data);
		$this->load->view('formulaire/recherche', $data);
		$this->load->view('footer', $data);
  }

  public function show()
  {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$key = $this->input->get('key');

		if (!is_null($key) && !empty($key)) {
			$data['form'] = $this->formulaire_model->get_total_form($key);
			if (empty($data['form'])) {
				$this->session->set_userdata('wrong_key', "Aucun formulaire ne correspond à cette clé");
				redirect('recherche');
			} else {
				$data['title'] = 'Répondre au formulaire';
				if ($this->session->has_userdata('user_session')) {
					$data['user'] = $this->session->userdata('user_session');
				}
				$this->load->view('header',$data);
				$this->load->view('formulaire/show', $data); 
				$this->load->view('footer',$data);
			}
		} else {
			$this->session->set_userdata('wrong_key', "Le champ ne doit pas être vide");
			redirect('recherche');
		}
  }

  public function send()
  {
		$data['title'] = 'Formulaire envoyé';

		if ($this->session->has_userdata('user_session')) {
			$data['user'] = $this->session->userdata('user_session');
		}

		$this->reponse_model->save_reponse();

		$this->load->view('header', $data);
		$this->load->view('formulaire/send', $data);
		$this->load->view('footer', $data);
  }

  public function stats()
  {
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}
		$data['title'] = 'Stats';
		$data['user'] = $this->session->userdata('user_session');

		$data['stats'] = $this->reponse_model->getStats();

		$this->load->view('header', $data);
		$this->load->view('reponse/stats', $data);
		$this->load->view('footer', $data);
  }

}

