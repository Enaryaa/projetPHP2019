
<title><?php echo $title; ?></title>

<div class="container mt-3">
	<div class="row">
		<div class="col-9">
        <?php echo form_open('formulaire'); ?>

			<div id="form">
				<label for="inputText">Titre</label>
				<input type="text" name="titre" class="form-control" placeholder="Titre">
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" rows="2"></textarea>
					<hr class="mb-4"></hr>
				</div>
      </div>

      <button type="submit" name="submit"  method="post" class="btn btn-warning">Sauvegarder</button>
      </form>
      

		</div>
		<div class="col-3" >
			<button type="button" id="addQuestionRep" class="btn btn-warning mb-3">Ajouter une Question/Reponse</button>
			<button type="button" id="addQuestionMulti" class="btn btn-warning">Ajouter une question à choix</button>
		</div>
	</div>
</div>

  	<script type="text/javascript">

  	function addRep(element, cpt) {

  		var parent = element.parentNode;
		$(parent).append('<input name="question[' + cpt + '][choix_rep][]" class="form-control mb-3" type="text">');
  	}

  	$(document).ready(function() {
  		$('#addQuestionRep').on("click", function() {
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
 