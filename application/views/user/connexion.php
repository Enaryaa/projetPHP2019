
<div class="jumbotron">
<h1 class="display-4">Connexion</h1>
<p class="lead">Content de vous revoir !</p>
</div>
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
<?php if (isset($error)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $error;?></p></div><?php } ?>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
		<?php echo form_open('connexion'); ?>