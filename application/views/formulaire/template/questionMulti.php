<div id="qChoix">
<div class="form-group" >
    <label for="exampleFormControlTextarea1">Question </label>
    <textarea name="question[<?php echo $cpt; ?>][label]"class="form-control" id="question" rows="3"></textarea>
  </div>
<div class="form-group" >
    <label for="exampleFormControlTextarea1">Aide </label>
    <textarea name="aide"class="form-control" id="question" rows="1"></textarea>
  </div>
<form>
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type de réponse</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="choixrep">
        <option value="1">Bouton radio</option>
        <option value="2">Case à cocher</option>
        <option value="3">Liste</option>
      </select>
    </div>

<div class="form-check">
	<input  name= "question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
	<label class="form-check-label mb-3" for="defaultCheck1">Question obligatoire</label>
</div>
<div class="form-group" id="containerChoix">
	<button type="button" id="ajoutRep<?php echo $cpt; ?>" class="btn btn-warning mb-3 mr-3">Ajouter une réponse</button>
  <button type="button" onclick="Suppr()" id="supprRep" class="btn btn-outline-danger mb-3">Supprimer la question</button>
</div>
</form>
<hr class="mb-4"></hr>
</div>
<script type="text/javascript">

var id = 'ajoutRep<?php echo $cpt; ?>';
var cpt = <?php echo $cpt; ?>;
var element = document.getElementById(id);
element.addEventListener('click', function() {
  addRep(element);
});


function Suppr() {
  var x = document.getElementById("qChoix");
  x.remove(x.selectedIndex);
}


</script>