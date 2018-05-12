<?php
if(empty($_POST) && empty($_GET['id'])){
	header('Location:' .get_home_url().'admin/users/?message=unknow_error');
}

if(!empty($_POST)){
	global $db;


	$sql = "UPDATE users 
			SET 
				email=(:email), 
				username=(:username), 
				firstname=(:firstname), 
				lastname=(:lastname),
				bio=(:bio),
				role=(:role)				
			WHERE id=(:id)";
		
	
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		
	$res->execute(
		array(
			':email' => $_POST['email'], 
			':username' => $_POST['username'], 
			':firstname' => $_POST['firstname'], 
			':lastname' => $_POST['lastname'], 
			':bio' => $_POST['bio'], 
			':role' => $_POST['role'], 
			':id' => $_POST['user_id']	
		)
	);
	
	
	if(!empty($_POST['password'])){
		$sql = "UPDATE users 
				SET password=(:password)			
				WHERE id=(:id)";
		$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$res->execute(
			array(
				':password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
				':id' => $_POST['user_id']	
  	
			)
		);
	}
	
	
	
	header('Location:' .get_home_url().'admin/users/?message=update_success');
}

$user_data=get_user_by_id($_GET['id']);
?>
<?php get_header('admin'); ?>
<!-- DOCUMENTATION HTML BOOTSTRAP MATERIAL https://demos.creative-tim.com/material-kit/docs/2.0/components/badge.html  --> 
<h2>Modifer <?php echo $user_data['username']; ?></h2>
<form method="post">
	<div class="field-group">
		<div class="field field-select">
			<label class="bmd-label-floating" for="role">Rôle de l'utilisateur</label>
			<select id="role"  class="form-control" name="role">
				<option value="admin"<?php if($user_data['role']=='admin'): echo ' selected'; endif; ?>>Administrateur</option>
				<option value="member"<?php if($user_data['role']=='member'): echo ' selected'; endif; ?>>Membre</option>
			</select>
	
		</div>
	</div>
	<div class="field form-group">
		<label class="bmd-label-floating" for="email">Email</label>
		<input id="email" class="form-control" type="email" name="email" value="<?php echo $user_data['email']; ?>" required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="username">Username</label>
		<input id="username" class="form-control"  type="text" name="username" value="<?php echo $user_data['username']; ?>"  required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="firstname">Prénom</label>
		<input id="firstname" class="form-control" type="text" name="firstname" value="<?php echo $user_data['firstname']; ?>"  required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="lastname">Nom</label>
		<input id="lastname" class="form-control"  type="text" name="lastname" value="<?php echo $user_data['lastname']; ?>"  required>

	</div>
	
	<div class="field-group">
		<div class="field form-group">
			<label class="bmd-label-floating" for="password">Mot de passe</label>
			<input id="password" class="form-control"  type="password" name="password">
		</div>
		<div class="field form-group">
			<label class="bmd-label-floating" for="password_again">Répéter le mot de passe</label>
			<input id="password_again" class="form-control"  type="password" name="password_again">
		</div>
	</div>
	
	<div class="field form-group">
		<label for="bio">Biographie</label>
		<textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $user_data['bio']; ?></textarea>
	</div>

	<input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>">
	<div class="field-group ">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a class="btn" href="<?php echo get_home_url() ?>admin/users">Annuler</a>
	</div>
</form>




<?php get_footer('admin'); ?>