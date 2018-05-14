<?php get_header(); ?>
<?php

/* Connexion
-------------------------------------------------- */
try{
	$db = new PDO('mysql:host=localhost;dbname=huniphp;charset=utf8', 'root', 'root', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
// les données envoyer via la formulaire 
if (!empty($_POST)){
	$valid=false;
	if ($_POST["name"]=="") {
       echo "<p>Enterez votre nome</p>";
   	}

	if ($_POST["email"]=="") {
       echo "<p>Enterez votre email</p>";
	}
		

	if ($_POST["subject"] =="") {
       echo "<p>Enterez le sujet</p>";
	}
		

	if ($_POST["message" ]=="") {
       echo "<p>Tapez votre text</p>";
	}
	



	$valid=false;
	if ($_POST["name" ]!="" && $_POST["email" ]!="" && $_POST["subject" ]!="" && $_POST["message" ]!="") {
		$valid=true;
		$alert="<h1>Votre message a été bien envoyer merci</h1>";

		// envoyer le mail avec définition de variable 
		$to = "hasinah.tabet@crea-inseec.com";
		$name = $_POST["name"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$email = $_POST["email"];
		$headers = "From: contact@hasinahsaleh.com" . "\r\n" .
		"Reply-To: ".$_POST["email"];
		mail($to,$subject,$message,$headers);

		// enregistrer le mail dans la base de donnée
		$sql = "INSERT INTO contact (name, email, subject, Message)
	    VALUES ('".$name."', '".$email."', '".$subject."', '".$message."')";
	    $db->exec($sql);
	    
					
	}
}

?>
<section id="intro-contact">
	<div class="container">
		<?php if(isset($alert)){ ?>
			<p><?php echo $alert; ?></p>
		<?php } ?>

		<div class="intro-contact">
			<div class="row">
				<div class="col-8">
					<h2>Introzap feel free contact us, welcome</h2>
					<p>With the first month behind us and feet firmly planted in February, we are now well into 2017 now and have many exciting things happening at introzap.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-8 text-center contact-form-intro">
		<h2>Let's talk</h2>
		<p>Suspe ndisse suscipit sagittis leo sit met dimentum estibulum issim posuere cubilia Curae Suspendisse at consectetur massa. Curabitur non ipsum nisinec dapibus elit. Donec nec</p>
	</div>
	<div class="container">
		<form class="contact-form" method="post">
			<div class="row">
				<div class="col-4">
					<input type="text" name="name" placeholder="Name">
				</div>
				<div class="col-4">
					<input type="email" name="email" placeholder="Email">
				</div>
				<div class="col-4">
					<input type="text" name="subject" placeholder="Subject">
				</div>
			</div>
			<textarea  name=" message" placeholder="Message"></textarea>
			<input type="submit" class="button" value="Send Message">
		</form>
	</div>
</section>
<?php get_footer(); ?>
