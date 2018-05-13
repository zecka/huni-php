<?php 
// LOOK MODELS FOR FORM ACTIONS
get_header('admin'); ?>
<!-- DOCUMENTATION HTML BOOTSTRAP MATERIAL https://demos.creative-tim.com/material-kit/docs/2.0/components/badge.html  --> 
<h2>Ajouter un utilisateur</h2>
<form method="post">
	
	<?php include_once('fields.php'); ?>

	<div class="field-group ">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		<a class="btn" href="<?php echo get_home_url() ?>admin/users">Annuler</a>
	</div>
</form>


<?php get_footer('admin'); ?>