<?php

class Formulaire extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index (){
		$data['title'] = 'Formulaire';
		$this->load->view('formulaire/formulaire', $data);
	}