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
function get_post_by_slug($slug){

	global $db;

	$reponse = $db->query('SELECT * FROM posts WHERE slug="'.$slug.'"');
	$post = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $post[0];	
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
function get_category_by_slug($slug){

	global $db;

	$reponse = $db->query('SELECT * FROM categories WHERE slug="'.$slug.'"');
	$category = $reponse->fetchAll( PDO::FETCH_ASSOC );

	return $category[0];	
}

/*
 * Get posts by category id	
*/
function get_category_posts($category_id){

	global $db;
	$query = $db->prepare( 'SELECT *
							FROM posts
								JOIN posts_categories ON posts.id = posts_categories.id_post
									WHERE posts_categories.id_category = :category_id');
	
	if ( $reponse = $query->execute( array( ':category_id' => $category_id ) ) ){
		$posts = $query->fetchAll( PDO::FETCH_ASSOC );
	}else{
		// No category is found
		$posts=array();
	}

	return $posts;	
}

function list_post_categories($post_id){
	$categories=get_post_categories($post_id);
	echo implode(', ', array_map(function ($entry) {
		  return $entry['title'];
	}, $categories));
}