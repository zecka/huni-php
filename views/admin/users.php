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
						data-username="<?php echo $user['username'] ?>"
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






<!-- Modal -->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLongTitle">
					Êtes-vous sure de vouloir supprimer l'utilisateur <strong class="modal_username">user</strong> ?
				</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Cette action est définitive vous ne pourrez pas revenir en arrière
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
				<a href="#" id="valid_delete" class="btn btn-primary">Oui</a>
			</div>
		</div>
	</div>
</div>


<?php get_footer('admin'); ?>