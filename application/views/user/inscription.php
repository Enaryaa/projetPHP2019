	
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
		<div class="form-group">
			<label for="inputEmail">Adresse Mail</label>
			<input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label for="inputPseudo">Pseudo</label>
			<input type="text" name="pseudo" class="form-control" id="inputPseudo" aria-describedby="pseudoHelp" placeholder="Pseudo">
			<small id="pseudoHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label for="inputPassword1">Mot de Passe</label>
			<input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Mot de passe">
		</div>
		<button type="submit" name="submit"  method="post" class="btn btn-warning">Inscription</button>
	</form>
</div>
<div class="col-4"></div>
</div>
