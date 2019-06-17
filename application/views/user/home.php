<div class="jumbotron">
  <?php if (isset($delete)) { ?><div class="alert alert-success" role="alert"><p><?php echo $delete;?></p></div><?php } ?>
  <h1 class="display-4">Créer des formulaires en fonction de vos besoins</h1>
  <p class="lead">Afin de pouvoir créer vos formulaires, un compte est nécessaire.</p>
  <hr class="my-4">
  <p>Si vous souhaitez juste remplir un formulaire et que vous avez sa clé, entrez là ci-dessous</p>
  <?php echo form_open('formulaire/show', array('method'=>'get')); ?>