<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	
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
		<button type="submit" name="submit"  method="post" class="btn btn-primary">Inscription</button>
	</form>



</div>

<div class="col-4"></div>
</div>


	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-myq8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>