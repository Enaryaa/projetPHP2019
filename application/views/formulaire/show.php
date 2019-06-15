<?php 

function showInputText($question) {
	echo 
	'<div class="form-group">
    	<label style="font-size: 1.21em!important;" for="rep_'.$question['quest_id'].'">'.$question['text_quest'].'</label>
    	<h6 class="font-italic" style="font-size: 0.87em!important;">'.$question['text_aide'].'</h6	>
    	<input type="text" class="form-control" name="rep['.$question['quest_id'].']" id="rep_'.$question['quest_id'].'">
  	</div>';
}

function showDate($question) {
	echo
	'<div class="form-group">
    	<label style="font-size: 1.21em!important;" for="rep_'.$question['quest_id'].'">'.$question['text_quest'].'</label>
    	<input class="form-control" type="date" value="'.date("Y-m-d").'" name="rep['.$question['quest_id'].']" id="rep_'.$question['quest_id'].'">
	</div>';
}

function showList($question, $reponses) {
	echo '<div class="form-group">
		    <label style="font-size: 1.21em!important;" for="rep_'.$question['quest_id'].'">'.$question['text_quest'].'</label>
    		<h6 class="font-italic" style="font-size: 0.87em!important;">'.$question['text_aide'].'</h6	>
		    <select class="form-control" id="rep_'.$question['quest_id'].'" name="rep['.$question['quest_id'].']">';
		    foreach ($reponses as $key => $rep) {
		    	echo '<option>'.$rep['text_reponse'].'</option>';
		    }
	echo  '</select>
		  </div>';
}

function showRadio($question, $reponses) {
	echo '<div class="form-group">
		    <label style="font-size: 1.21em!important;" for="rep_'.$question['quest_id'].'">'.$question['text_quest'].'</label>
    		<h6 class="font-italic" style="font-size: 0.87em!important;">'.$question['text_aide'].'</h6	>';
		    foreach ($reponses as $key => $rep) {
		    	echo '<div class="form-check">
					  <input class="form-check-input" type="radio" name="rep['.$question['quest_id'].']" id="rep_'.$question['quest_id'].'_'.$rep['id_rep'].'" value="'.$rep['text_reponse'].'">
					  <label class="form-check-label" for="rep_'.$question['quest_id'].'_'.$rep['id_rep'].'">'.$rep['text_reponse'].'</label>
					</div>';
		    }
	echo  '</div>';
}

function showCheckBox($question, $reponses) {
	echo '<div class="form-group">
		    <label style="font-size: 1.21em!important;" for="rep_'.$question['quest_id'].'">'.$question['text_quest'].'</label>
    		<h6 class="font-italic" style="font-size: 0.87em!important;">'.$question['text_aide'].'</h6	>';
		    foreach ($reponses as $key => $rep) {
		    	echo '<div class="form-check">
					  <input class="form-check-input" type="checkbox" name="rep['.$question['quest_id'].']['.$rep['id_rep'].']" id="rep_'.$question['quest_id'].'_'.$rep['id_rep'].'" value="'.$rep['text_reponse'].'">
					  <label class="form-check-label" for="rep_'.$question['quest_id'].'_'.$rep['id_rep'].'">'.$rep['text_reponse'].'</label>
					</div>';
		    }
	echo  '</div>';
}


function getReponsesByQuestionId($reponses, $question_id) {
	$mRep = [];
	foreach ($reponses as $key => $rep) {
		if ($rep['quest_id'] == $question_id) {
			$mRep[$key] = $rep;
		}
	}
	return $mRep;
}

?>

<div class="container">
	<h1><?php echo $form['titre']; ?></h1>
	<h3><?php echo $form['description']; ?></h3>
	<hr>
	<?php echo form_open('formulaire/send'); ?>
		<input type="hidden" name="form_id" value="<?php echo $form['form_id'] ?>">
		<?php foreach ($form['question'] as $key => $question) {
			switch ($question['type_rep']) {
				case 'text':
					showInputText($question);
					break;
				case 'radio':
					showRadio($question, getReponsesByQuestionId($form['reponse'], $question['quest_id']));
					break;
				case 'checkbox':
					showCheckBox($question, getReponsesByQuestionId($form['reponse'], $question['quest_id']));
					break;
				case 'list':
					showList($question, getReponsesByQuestionId($form['reponse'], $question['quest_id']));
					break;
				case 'date':
					showDate($question);
					break;
				default:
					showInputText($question);
					break;
			}
		} ?>
		<hr>
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
</div>