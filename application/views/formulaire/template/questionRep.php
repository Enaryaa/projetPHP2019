<input type="hidden" name="question[<?php echo $cpt; ?>][type_rep]" value="text">
<div class="form-group">
	<label for="exampleFormControlTextarea1">Question</label>
	<textarea name="question[<?php echo $cpt; ?>][label]" class="form-control" id="question" rows="1"></textarea>
</div>
<div class="form-check">
	<input name="question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
	<label class="form-check-label" for="defaultCheck1">Question Obligatoire</label>
</div>
<hr class="mb-4"></hr>