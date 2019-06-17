<?php
class Reponse_model extends CI_Model {
  public function __construct()
  {
		$this->load->database();
		$this->load->model('participant_model');
		$this->load->model('formulaire_model');
		$this->load->helper('url');
		$this->load->helper('url_helper');
  }

  public function save_reponse()
  {
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

  public function getStats()
  {
		$stats = [];
		$key = $this->input->get('cle');
		$form = $this->formulaire_model->get_total_form($key);
		if (empty($form)) {
			return [];
		}

		$stats['form'] = $form;
		$stats['nbParticipant'] = $this->getDistinctParticipantByForm($form['form_id']);
		$stats['reponseCount'] = $this->getReponseMultiForStat($form['form_id']);

		return $stats;
  }

  private function getDistinctParticipantByForm($form_id)
  {
		$sql = "SELECT COUNT(DISTINCT id_participant) as result FROM reponse_donnee WHERE id_form = ?";
		$query = $this->db->query($sql, $form_id);
		$result = $query->row_array();
		return $result['result'];
  }

  private function getReponseMultiForStat($form_id)
  {
		$sql = "SELECT DISTINCT id_quest, text_quest, COUNT(text_reponse) as count, text_reponse 
				FROM reponse_donnee, question 
				WHERE id_form = ? 
				AND id_rep IS NOT NULL 
				AND quest_id = id_quest 
				GROUP BY text_reponse";
		$query = $this->db->query($sql, $form_id);
		return json_decode(json_encode($query->result()), true); 
		//ici on a un StrObject, c'est un hack pour le changer en array
  }

}

