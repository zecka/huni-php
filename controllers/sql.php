<?php

// Connexion à la base de donnée
try{ $db = new PDO('mysql:host=localhost;dbname=huniphp','root', 'root', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
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

function get_comments($options=array()){

	global $db;

	$reponse = $db->query('SELECT * FROM comments ');
	$comments = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $comments;	
}

function get_comments_by_id($id){

	global $db;

	$reponse = $db->query('SELECT * FROM comments WHERE article="'.$id.'"');
	$comments = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $comments;	
}

function get_categories($options=array()){

	global $db;

	$reponse = $db->query('SELECT * FROM categories');
	$categories = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $categories;	
}


function get_post_categories($post_id){

	global $db;
	$query = $db->prepare( 'SELECT categories.id, categories.title, categories.slug 
							FROM categories
								JOIN posts_categories ON categories.id = posts_categories.id_category
									WHERE posts_categories.id_post = :post_id');
	
	if ( $reponse = $query->execute( array( ':post_id' => $post_id ) ) ){
		$categories = $query->fetchAll( PDO::FETCH_ASSOC );
	}else{
		// No category is found
		$categories=array();
	}

	return $categories;	
}

function list_post_categories($post_id){
	$categories=get_post_categories($post_id);
	echo implode(', ', array_map(function ($entry) {
		  return $entry['title'];
	}, $categories));
}