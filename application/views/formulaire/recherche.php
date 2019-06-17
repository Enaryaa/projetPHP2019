<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Veuillez saisir la clé du formulaire auquel vous souhaitez répondre </h1>
    <h2 class="lead"></h2>
  </div>
</div>
<div class="container">
	<?php if (isset($wrong_key)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $wrong_key; ?></p></div><?php } ?>
	<?php echo form_open('formulaire/show', array('method'=>'get')); ?>