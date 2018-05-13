<?php get_header('admin'); ?>
<!-- DOCUMENTATION HTML BOOTSTRAP MATERIAL https://demos.creative-tim.com/material-kit/docs/2.0/components/badge.html  --> 
<h2>Modifer <?php echo $user_data['username']; ?></h2>
<form method="post">
	<?php include_once('fields.php'); ?>

	<input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>">
	<div class="field-group ">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a class="btn" href="<?php echo get_home_url() ?>admin/users">Annuler</a>
	</div>
</form>




<?php get_footer('admin'); ?>