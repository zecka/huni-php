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
		<input id="password" class="form-control" type="password" name="password"<?php if($user_data['password']!=''){ echo ' required'; } ?>>
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