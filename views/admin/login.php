<?php 

if(!empty($_POST)){
	global $db;
	$email = $_POST['email'];
	//  Récupération de l'utilisateur et de son pass hashé
	$req = $db->prepare('SELECT id, password, username FROM users WHERE email = :email');
	$req->execute(array(
	    'email' => $email));
	$resultat = $req->fetch();
	

	// Comparaison du pass envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
	
	if (!$resultat)
	{
	    echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{
	    if ($isPasswordCorrect) {
			// session_start();
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $resultat['username'];
			
			header('Location: '.get_home_url().'admin');
			exit;
	    }
	    else {
	        echo 'Mauvais identifiant ou mot de passe !';
	    }
	}
}
?>
<!DOCTYPE html>
<html class="login" lang="en">
<head>
	<meta charset="UTF-8">
	<title>HUNI | Log in</title>
	<link rel="stylesheet" href="<?php echo get_assets_url(); ?>/css/login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body class="login">
	
	<form class="form-signin" method="post">
		<img class="mb-4" src="<?php echo get_assets_url(); ?>img/huni-logo-black.svg" alt="" width="120" >
		<h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
		
		<label for="inputEmail" class="sr-only">Adresse email</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
		
		<label for="inputPassword" class="sr-only">Mot de passe</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
		
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Se souvenir de moi
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
		<p class="mt-5 mb-3 text-muted">© MadMat, ZecKa, Hasinah</p>
	</form>
</body>
</html>
