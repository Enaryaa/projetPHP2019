<div class="container">
	<?php if (isset($wrong_key)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $wrong_key; ?></p></div><?php } ?>
	<h2> Veuillez saisir la clé du formulaire auquel vous souhaitez répondre </h2>
	<?php echo form_open('formulaire/show', array('method'=>'get')); ?>  
		<div class="form-inline">
			<label class="sr-only" for="key">Clé formulaire</label>
			<input type="text" class="form-control mb-2 mr-sm-2" id="key" name="key" placeholder="Clé du formulaire">
			<button type="submit" class="btn btn-warning mb-2">Envoyer</button>
		</div>
	</form>
</div>