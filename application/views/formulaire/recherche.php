<div class="form-inline">
  	<?php echo form_open('formulaire/show', array('method'=>'get')); ?>
  	<p> Veuillez saisir la clé du formulaire auquel vous souhaitez répondre </p>
  <label class="sr-only" for="key">Clé formulaire</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="key" placeholder="Clé du formulaire">
  <button type="submit" class="btn btn-warning mb-2">Envoyer</button>
  </div>