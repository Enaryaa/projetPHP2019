<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo site_url('home'); ?>">Game of Forms</a>
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
          <a class="dropdown-item" href="<?php echo site_url('formulaire'); ?>">Créer un formulaire</a>
          <a class="dropdown-item" href="#">Gérer les formulaires</a>
          <a class="dropdown-item" href="<?php echo site_url('formulaire'); ?>">Répondre à un formulaire</a>
        </div>
        
      </li>

    </ul>
    <?php if (isset($user)) { ?>
    <div class="dropdown">
      <button class="btn btn-outline-warning my-2 my-sm-0 dropdown-toggle" type="button" id="menuUser" data-toggle="dropdown" aria-hasgroup="true" aria-expanded="false"><?php echo $user['pseudo']; ?></button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuUser">
          <a class="dropdown-item" href="<?php echo site_url('compte'); ?>">Compte</a>

          <a class="dropdown-item" href="<?php echo site_url('deco'); ?>">Déconnexion</a>
        </div>
    </div>
    <?php } else { ?>
    <form class="form-inline my-2 my-lg-0" method="get" action="inscription">
      <button class="btn btn-outline-warning my-2 my-sm-0 mr-3" type="submit">Inscription</button>
    </form>
    <form class="form-inline my-2 my-lg-0" method="get" action="connexion">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Connexion</button>
    </form>
    <?php } ?>
  </div>
</nav>