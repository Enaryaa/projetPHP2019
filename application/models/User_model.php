<?php

class User_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_user() {
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function create_user() {
		$this->load->helper('url');
		$data = [
			'email' => $this->input->post('email'),
			'pseudo' => $this->input->post('pseudo'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		];

		return $this->db->insert('user', $data);
	}

	public function connect() {
		$this->load->helper('url');
		$data = [
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		];

		$sql = "SELECT * FROM user WHERE email = ?";
		$query = $this->db->query($sql, [$data['email']]);

		$result = $query->row_array();
		if (isset($result)) {
			return password_verify($data['password'], $result['password']);
		}

		return false;
	}
}
