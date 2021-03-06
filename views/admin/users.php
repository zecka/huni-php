<?php get_header('admin'); ?>
<?php 
	if(isset($message) && isset($message_type)): ?>
		<div class="alert alert-<?php echo $message_type; ?>">
			<?php echo $message; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
			</button>
		</div>
	<?php
	endif; ?>
	
	
<div class="title-section">
	<h2>Utilisateurs</h2>
	<a class="btn btn-primary" href="<?php echo get_home_url() ?>admin/user/add">Ajouter un utilisateur</a>
</div>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Rôle</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$users=get_users(); 
		foreach($users as $user): ?>
			
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><?php echo $user['firstname']; ?></td>
				<td><?php echo $user['lastname']; ?></td>
				<td><?php echo $user['role']; ?></td>

				<td>
					<a class="btn btn-primary" href="<?php echo get_home_url(); ?>admin/user/edit?id=<?php echo $user['id'] ?>">
						<i class="material-icons">edit</i>
						Modifier
					</a>
					
					<!-- Button trigger modal -->
					<button 
						data-link="<?php echo get_home_url(); ?>admin/user/delete?id=<?php echo $user['id'] ?>" 
						data-title="<?php echo $user['username'] ?>"
						type="button" 
						class="btn btn-danger btn-delete" 
						data-toggle="modal" 
						data-target="#modal_delete">
							<i class="material-icons">delete</i>
							Supprimer
					</button>
				</td>
			</tr>
			
		<?php	
		endforeach;
		?>
	</tbody>
</table>


<?php get_modal_delete(); ?>

<?php get_footer('admin'); ?>