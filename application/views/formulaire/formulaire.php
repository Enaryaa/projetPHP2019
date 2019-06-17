<div class="container mt-3">
  <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
  <?php if (isset($error)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $error;?></p></div><?php } ?>
	<div class="row">
		<div class="col-9">
        <?php echo form_open('formulaire'); ?>