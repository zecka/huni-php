<?php get_header(); ?>

<div class="container">
	Ceci est une page d'exemple affichée depuis le modèle<br>
	Elle peut également récupérer des variables depuis son model (models/exemple.php)<br>
	
	Valeur de la variable $test définie dans le modèle est <?php echo $test; ?>
</div>

<?php get_footer(); ?>