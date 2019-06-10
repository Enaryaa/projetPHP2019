
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Gérer les formulaires</h1>
    <p class="lead">Vous pouvez acitver, désactiver ou récupérer les resultats de vos formulaires.</p>
  </div>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Clé</th>
      <th scope="col">Date</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($formulaires as $form) {
	if (intval($form['active'])){
     	echo '<tr class="table-light">';
     }
     else {
     	echo '<tr class="table-danger">';
     }
    echo '<th scope="row">' . $form['titre'] . '</th>
      <td>' . $form['form_key'] . '</td>
      <td>' . $form['date'] . '</td>
      <td>
      <form action="/formulaire/active" method="GET">
      <input type="hidden" name="cle" value="'. $form['form_key'] .'" />';
     if (intval($form['active'])){
     echo	'<button type="submit, start)" class="btn btn-outline-danger">Périmer</button>';
     }
     else {
     echo	'<button type="submit" class="btn btn-success">Activer</button>';
     }
    echo '</form></td>
    	</tr>';
  	}
  	?>
  </tbody>
</table>