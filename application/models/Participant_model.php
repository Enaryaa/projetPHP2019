<?php
class Participant_model extends CI_Model {
  public function __construct()
  {
		$this->load->database();
  }

  public function create_participant()
  {
		$sql = "INSERT INTO participant (id_participant) VALUES (NULL)";
		return $this->db->query($sql);
  }

  public function getLastParticipant()
  {
		$sql = "SELECT * FROM participant ORDER BY id_participant DESC LIMIT 1";
		$query = $this->db->query($sql);
		$participant = $query->row_array();
		return $participant['id_participant'];
  }

}

