<?php get_header('admin'); ?>
<h2>Ajouter un utilisateur</h2>
<form method="post">
	<div class="field-group">
		<div class="field field-select">
			<label class="bmd-label-floating" for="role">Rôle de l'utilisateur</label>
			<select id="role"  class="form-control" name="role">
				<option value="admin" selected>Administrateur</option>
				<option value="member">Membre</option>
			</select>
	
		</div>
	</div>
	<div class="field form-group">
		<label class="bmd-label-floating" for="email">email</label>
		<input id="email" class="form-control" type="email" name="email" required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="username">Username</label>
		<input id="username" class="form-control"  type="text" name="username" required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="firstname">Prénom</label>
		<input id="firstname" class="form-control" type="text" name="firstname" required>
	</div>
	
	<div class="field form-group">
		<label class="bmd-label-floating" for="lastname">Nom</label>
		<input id="lastname" class="form-control"  type="text" name="lastname" required>

	</div>
	
	<div class="field-group">
		<div class="field form-group">
			<label class="bmd-label-floating" for="password">Mot de passe</label>
			<input id="password" class="form-control"  type="password" name="password" required>
		</div>
		<div class="field form-group">
			<label class="bmd-label-floating" for="password_again">Répéter le mot de passe</label>
			<input id="password_again" class="form-control"  type="password" name="password_again" required>
		</div>
	</div>
	
	<div class="field form-group">
		<label for="bio">Biographie</label>
		<textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
	</div>


	<div class="field-group ">
		<button type="submit" class="btn btn-default">Ajouter</button>
	</div>
</form>




<?php get_footer('admin'); ?>