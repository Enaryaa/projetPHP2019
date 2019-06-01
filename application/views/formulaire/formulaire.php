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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home">Game of Forms</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Formulaire
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/formulaire">Créer un formulaire</a>
          <a class="dropdown-item" href="#">Gérer les formulaires</a>
        </div>
        
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-outline-warning my-2 my-sm-0 dropdown-toggle" type="button" id="menuUser" data-toggle="dropdown" aria-hasgroup="true" aria-expanded="false"><?php echo $user['pseudo']; ?></button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuUser">
          <a class="dropdown-item" href="/compte">Compte</a>

          <a class="dropdown-item" href="<?php echo site_url('deco'); ?>">Déconnexion</a>
        </div>
    </div>
  </div>
</nav>

<div class="container mt-3">
	<div class="row">
		<div class="col-9">
			<form id="form">
				<label for="inputEmail">Titre</label>
				<input type="text" name="titre" class="form-control">
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" rows="2"></textarea>
					<hr class="mb-4"></hr>
				</div>
			</form>

		</div>
		<div class="col-3" >
			<button type="button" id="addQuestionRep" class="btn btn-primary mb-3">Ajouter une Question/Reponse</button>
			<button type="button" id="addQuestionMulti" class="btn btn-primary">Ajouter une question à choix</button>
		</div>
	</div>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  	<script type="text/javascript">
  	function addRep(element, cpt) {
  		var parent = element.parentNode;
		$(parent).append('<input name="question[' + cpt + '][choix_rep][]" class="form-control" type="text">');
  	}
  	$(document).ready(function() {
  		$('#addQuestionRep').on("click", function() {
  			console.log("ajout d'une question réponse");
  			$.ajax('formulaire/questionrep')
  			.done(function(result) {
  				$('#form').append(result);
  			});
  		});
  		$('#addQuestionMulti').on("click", function(){
  			$.ajax('formulaire/questionchoix')
  			.done(function(result){
  				$('#form').append(result);
  			});
  		});

  		$('#ajoutRep').on("click", function(){
  			
  		})
  	});
  </script>
  </body>
  </html>