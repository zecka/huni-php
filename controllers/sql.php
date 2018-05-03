<?php

// Connexion à la base de donnée
try{ $db = new PDO('mysql:host=localhost;dbname=huniphp','root', '', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

/*
 * Fonction qui permet de récupérer les articles dans la base de données
 * @arg array
 * @return array
*/
function get_posts($options=array()){

	global $db;

	$reponse = $db->query('SELECT * FROM posts');
	$posts = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $posts;
	
}