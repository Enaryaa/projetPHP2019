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