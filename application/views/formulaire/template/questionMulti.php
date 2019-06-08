<div id="qChoix">
<div class="form-group" >
    <label for="exampleFormControlTextarea1">Question </label>
    <input  type="text" name= "question[<?php echo $cpt; ?>][text_quest]" value="" id="question" size="80">
  </div>
<div class="form-group" >
    <label for="exampleFormControlTextarea1">Aide </label>
    <input type="text" name= "question[<?php echo $cpt; ?>][text_aide]" value="" id="question" size="80">
  </div>
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type de réponse</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="question[<?php echo $cpt; ?>][type_rep]">
        <option value="radio">Bouton radio</option>
        <option value="checkbox">Case à cocher</option>
        <option value="list">Liste</option>
      </select>
    </div>
<div class="form-check">
	<input  name= "question[<?php echo $cpt; ?>][requis]" class="form-check-input" type="checkbox" value="required" id="defaultCheck1">
	<label class="form-check-label mb-3" for="defaultCheck1">Question obligatoire</label>
</div>
<div class="form-group" id="containerChoix">
	<button type="button" id="ajoutRep<?php echo $cpt; ?>" class="btn btn-warning mb-3 mr-3">Ajouter une réponse</button>
  <button type="button" onclick="Suppr()" id="supprRep" class="btn btn-outline-danger mb-3">Supprimer la question</button>

</div>
<hr class="mb-4"></hr>
</div>
<script type="text/javascript">

var id = 'ajoutRep<?php echo $cpt; ?>';
var cpt = <?php echo $cpt; ?>;
var element = document.getElementById(id);
element.addEventListener('click', function() {
  addRep(element, cpt);
});


function Suppr() {
  var x = document.getElementById("qChoix");
  x.remove(x.selectedIndex);
}


</script>