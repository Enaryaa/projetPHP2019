<div class="container">
<?php if (!empty($stats)) { ?>
	<h1>Nombre de participant : <?php echo $stats['nbParticipant']; ?></h1>

	<?php foreach ($stats['reponseCount'] as $key => $value) { ?>
		<p>Pour la question <?php echo $value['text_quest']; ?>, 
			la réponse <?php echo $value['text_reponse']; ?> à été choisi 
			à <?php echo (intval($value['count']) / intval($stats['nbParticipant'])) * 100?> %</p>
	<?php } ?>
<?php } else { ?>
	<h1> aucun résultat</h1>
<?php } ?>
</div>

