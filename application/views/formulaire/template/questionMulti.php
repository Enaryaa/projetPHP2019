<div class="form-group">
    <label for="exampleFormControlTextarea1">Question </label>
    <textarea name="question[<?php echo $cpt; ?>][label]"class="form-control" id="question" rows="3"></textarea>
  </div>

<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="btnradio" autocomplete="off" checked> Bouton radio
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="btncheck" autocomplete="off"> Case à cocher
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="liste" autocomplete="off"> Liste déroulante
  </label>
</div>

<div class="form-check">
	<input  name= "question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
	<label class="form-check-label mb-3" for="defaultCheck1">Question obligatoire</label>
</div>
<div class="form-group" id="containerChoix">
	<button type="button" id="ajoutRep<?php echo $cpt; ?>" class="btn btn-warning mb-3">Ajouter une réponse</button>
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