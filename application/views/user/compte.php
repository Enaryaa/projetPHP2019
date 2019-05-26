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
  <a class="navbar-brand" href="#">Game of Forms</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Fonctionnalité</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Formulaire
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Gérer les formulaires</a>
          <a class="dropdown-item" href="#">Créer les formulaires</a>
        </div>

      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-outline-warning my-2 my-sm-0 dropdown-toggle" type="button" id="menuUser" data-toggle="dropdown" aria-hasgroup="true" aria-expanded="false"><?php echo $user['pseudo']; ?></button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuUser">
          <a class="dropdown-item" href="<?php echo site_url('deco'); ?>">Déconnexion</a>
        </div>
    </div>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Bienvenue <?php echo $user['pseudo']; ?></h1>
    <p class="lead">Compte</p>
  </div>
</div>


<div class="container">


  <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
  <?php if (isset($error)) { ?><div class="alert alert-danger" role="alert"><p><?php echo $error;?></p></div><?php } ?>
<?php if (isset($succes)) { ?><div class="alert alert-success" role="alert"><p><?php echo $succes;?></p></div><?php } ?>

<?php echo form_open('compte'); ?>
    <div class="form-group">
      <label for="inputPassword1">Changer votre mot de passe</label>
      <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Mot de passe">
    </div>
       <div class="form-group">
      <label for="inputPassword2">Confirmer votre mot de passe</label>
      <input type="password" name="passwordConf" class="form-control" id="inputPassword2" placeholder="Mot de passe">
    </div>
    <button type="submit" name="submit"  method="post" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
  <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo site_url('delete'); ?>">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Supprimer compte</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>