<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Formulaire : <?php echo $stats['form']['titre']; ?></h1>
    <h2 class="lead">Nombre de participant : <?php echo $stats['nbParticipant']; ?></h2>
    <form action="<?php echo site_url('formulaire/gerer'); ?>">
<button type="submit" class="btn btn-warning mt-3">Retour</button>
</form>
  </div>
</div>

<div class="container">
<?php if (!empty($stats)) { ?>

	<?php foreach ($stats['reponseCount'] as $key => $value) { ?>
		<p style="font-size: 1.10em!important;">Pour la question <?php echo $value['text_quest']; ?> <br>
			La réponse <?php echo $value['text_reponse']; ?> à été choisi 
			à <?php echo round((intval($value['count']) / intval($stats['nbParticipant'])) * 100,2); ?> %</p>
	<?php } ?>
<?php } else { ?>
	<p style="font-size: 1.10em!important;"> Aucun résultat</p>
<?php } ?>

</div>

