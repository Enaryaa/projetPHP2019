<?php

class Reponse_model extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->model('participant_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
	}

	public function save_reponse() {
		$this->participant_model->create_participant();
		$parcipantId = $this->participant_model->getLastParticipant();

		$formId = $this->input->post('form_id');
		$reponses = $this->input->post('rep');

		$repForQuery = [];
		foreach ($reponses as $key => $rep) {
			$newRep = [
				'id_participant' => $parcipantId,
				'id_form' => $formId,
				'id_quest' => $key,
			];

			if (is_array($rep)) {
				foreach ($rep as $key => $value) {
					$tmp = $newRep;
					$tmp['id_rep'] = $key;
					$tmp['text_reponse'] = $value;

					$repForQuery[] = $tmp;
				}
			} else {
				$newRep['id_rep'] = null;
				$newRep['text_reponse']	= $rep;			

				$repForQuery[] = $newRep;	
			}
		}

		return $this->db->insert_batch('reponse_donnee', $repForQuery);

	}

	public function getStats() {

		return [];
	}
}