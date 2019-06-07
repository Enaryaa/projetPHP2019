<div id="qRep">
<input type="hidden" name="question[<?php echo $cpt; ?>][type_rep]" value="text">
<div class="form-group">
	<label for="exampleFormControlTextarea1">Question</label>
	<textarea name="question[<?php echo $cpt; ?>][text_quest]" class="form-control" id="question" rows="1"></textarea>
</div>
<div class="form-group" >
    <label for="exampleFormControlTextarea1">Aide </label>
    <textarea name="aide"class="form-control" id="aide" rows="1"></textarea>
  </div>
<div class="form-check">
	<input name="question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
	<label class="form-check-label" for="defaultCheck1">Question Obligatoire</label>
	  <button type="button" onclick="SupprRep()" class="btn btn-outline-danger mb-3">Supprimer la question</button>

</div>
<hr class="mb-4"></hr>
</div>

<script type="text/javascript">

function SupprRep() {
  var x = document.getElementById("qRep");
  x.remove(x.selectedIndex);
}


</script>