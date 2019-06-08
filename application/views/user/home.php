<div class="jumbotron">
  <?php if (isset($delete)) { ?><div class="alert alert-success" role="alert"><p><?php echo $delete;?></p></div><?php } ?>
  <h1 class="display-4">Créer des formulaires en fonction de vos besoins</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <div class="form-inline">
  	<?php echo form_open('formulaire/show', array('method'=>'get')); ?>
  <label class="sr-only" for="key">Clé formulaire</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="key" placeholder="Clé du formulaire">
  <button type="submit" class="btn btn-warning mb-2">Envoyer</button>
</div>
</div>