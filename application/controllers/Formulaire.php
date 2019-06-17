<?php


require_once 'Controller.php';


class Formulaire extends CI_Controller {
  public function __construct()
  {
		parent::__construct();
       	$this->load->library('session');
		$this->load->model('formulaire_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
		
  }

  public function index()
  {
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
				redirect('formulaire/gerer');
			} else {
				$data['error'] = 'Formulaire incorrect';
				$this->load->view('header', $data);
				$this->load->view('formulaire/formulaire', $data);
				$this->load->view('footer', $data);
			}
		}
  }

  public function modifier_active()
  {
		$this->formulaire_model->modifier_active();
		redirect('formulaire/gerer');
  }

  public function gerer()
  {
		if (!$this->session->has_userdata('user_session')) {
			redirect('connexion');
		}
		$data['user'] = $this->session->userdata('user_session');
		$data['title'] = 'Gerer';
		$data['formulaires'] = $this->formulaire_model->get_forms_by_user($data['user']['user_id']);
		$this->load->view('header', $data);
		$this->load->view('formulaire/gerer', $data);
		$this->load->view('footer', $data);
  }

  public function questionRep()
  {
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);
		$this->load->view('formulaire/template/questionRep', $data);
  }

  public function questionMulti()
  {
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);

		$this->load->view('formulaire/template/questionMulti', $data);
  }

  public function questionDate()
  {
		$data['cpt'] = $this->getCptQuestion();
		$this->incrementeCptQuestion($data['cpt']);

		$this->load->view('formulaire/template/questionDate', $data);
  }

  public function getCptQuestion()
  {
		if (!$this->session->has_userdata('cpt_question')) {
			$this->session->set_userdata('cpt_question', 0);
		}
		return $this->session->userdata('cpt_question');
  }

  public function removeCptQuestion()
  {
		if ($this->session->has_userdata('cpt_question')) {
			$current = $this->session->userdata('cpt_question');
			$this->decrementCptQuestion($current);
		}
		return $this->session->userdata('cpt_question');
  }

  private function incrementeCptQuestion($current)
  {
		$this->session->set_userdata('cpt_question', $current + 1);
  }

  private function decrementCptQuestion($current)
  {
		$this->session->set_userdata('cpt_question', $current - 1);
  }

}
?>
