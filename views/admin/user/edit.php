<?php get_header('admin'); ?>
<!-- DOCUMENTATION HTML BOOTSTRAP MATERIAL https://demos.creative-tim.com/material-kit/docs/2.0/components/badge.html  --> 
<h2>Modifer <?php echo $user_data['username']; ?></h2>

<?php if(isset($message) && isset($message_type)): ?>
	<div class="alert alert-<?php echo $message_type; ?>">
		<?php echo $message; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="material-icons">clear</i></span>
		</button>
	</div>
<?php endif; ?>

<form method="post">
	<?php include_once('fields.php'); ?>

	<input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>">
	<div class="field-group ">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a class="btn" href="<?php echo get_home_url() ?>admin/users">Annuler</a>
	</div>
</form>




<?php get_footer('admin'); ?>