<div class="form-group">
    <label for="exampleFormControlTextarea1">Question </label>
    <textarea name="question[<?php echo $cpt; ?>][label]"class="form-control" id="question" rows="3"></textarea>
  </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Type de réponse</label>
    <select name="question[<?php echo $cpt; ?>][type_rep]" class="form-control" id="exampleFormControlSelect1">
      <option>Bouton radio</option>
      <option>Case à cocher</option>
      <option>Liste déroulante</option>
    </select>
</div>
<div class="form-check">
	<input  name= "question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
	<label class="form-check-label mb-3" for="defaultCheck1">Question obligatoire</label>
</div>
<div class="form-group" id="containerChoix">
	<button type="button" id="ajoutRep<?php echo $cpt; ?>" class="btn btn-primary mb-3">Ajouter une réponse</button>
</div>
<hr class="mb-4"></hr>
<script type="text/javascript">
var id = 'ajoutRep<?php echo $cpt; ?>';
var cpt = <?php echo $cpt; ?>;
var element = document.getElementById(id);
element.addEventListener('click', function() {
	addRep(element);
});
</script>