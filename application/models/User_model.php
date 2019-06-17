<?php
class User_model extends CI_Model {
  public function __construct()
  {
		$this->load->database();
       	$this->load->library('session');
  }

  public function get_user()
  {
		$query = $this->db->get('user');
		return $query->result_array();
  }

  public function create_user()
  {
		$this->load->helper('url');
		$data = [
			'email' => $this->input->post('email'),
			'pseudo' => $this->input->post('pseudo'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		];

		return $this->db->insert('user', $data);
  }

  public function update_password()
  {
		$this->load->helper('url');
		$user = $this->session->userdata('user_session');
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$sql = "UPDATE user SET password = ? WHERE email = ?";

		return $this->db->query($sql, array($password, $user['email']));
  }

  public function get_user_by_email($email)
  {
		$sql = "SELECT * FROM user WHERE email = ?";
		$query = $this->db->query($sql, $email);

		return $query->row_array();
  }

  public function delete_user()
  {
		$user = $this->session->userdata('user_session');
		$sql = "DELETE from user WHERE email = ?";
		return $this->db->query($sql, $user['email']);
  }

  public function set_session_user()
  {
		$this->load->helper('url');

		$email = $this->input->post('email');

		$result = $this->get_user_by_email($email);

		if (isset($result)) {
			$this->session->set_userdata('user_session', $result);
		}
  }

  public function connect()
  {
		$this->load->helper('url');

		$data = [
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		];

		$result = $this->get_user_by_email($data['email']);
		if (isset($result)) {
			return password_verify($data['password'], $result['password']);
		}

		return false;
  }

}

