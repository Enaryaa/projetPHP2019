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
    <button type="submit" name="submit"  method="post" class="btn btn-primary mb-3">Enregistrer les modifications</button>
  </form>
  <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo site_url('delete'); ?>">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Supprimer compte</button>
    </form>
</div>
