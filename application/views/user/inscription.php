	
 <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
  <?php if (isset($error)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $error;?></p></div><?php } ?>
<div class="jumbotron">
  <h1 class="display-4 ">Inscription </h1>
  <p class="lead ">Incrivez vous afin de pouvoir créer vos propres formulaires.</p>
  <p>Afin de partager votre formulaire, une clé vous sera fournie.</p>
</div>

<div class="row">
<div class="col-4"></div>
<div class="col-4">
<?php echo form_open('inscription'); ?>