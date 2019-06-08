
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
			<div class="form-group">
				<label for="inputEmail">Adresse Mail</label>
				<input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
				<small id="emailHelp" class="form-text text-muted"></small>
			</div>
			<div class="form-group">
				<label for="inputPassword">Mot de Passe</label>
				<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
			</div>
			<button type="submit" name="envoi" method="post" class="btn btn-warning">Connexion</button>
		</form>
		</div>
		<div class="col-4"></div>
	</div>
