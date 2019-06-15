<div class="jumbotron">
  <?php if (isset($delete)) { ?><div class="alert alert-success" role="alert"><p><?php echo $delete;?></p></div><?php } ?>
  <h1 class="display-4">Créer des formulaires en fonction de vos besoins</h1>
  <p class="lead">Afin de pouvoir créer vos formulaires, un compte est nécessaire.</p>
  <hr class="my-4">
  <p>Si vous souhaitez juste remplir un formulaire et que vous avez sa clé, entrez là ci-dessous</p>
  <?php echo form_open('formulaire/show', array('method'=>'get')); ?>  
    <div class="form-inline">
      <label class="sr-only" for="key">Clé formulaire</label>
      <input type="text" class="form-control mb-2 mr-sm-2" id="key" name="key" placeholder="Clé du formulaire">
      <button type="submit" class="btn btn-warning mb-2">Envoyer</button>
    </div>
  </form>
</div>
</div>