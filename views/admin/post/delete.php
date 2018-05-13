<?php
if(empty($_GET['id'])){
	header('Location:' .get_home_url().'admin/posts/?message=unknow_error');
}else{
	
	global $db;
	$sql = "DELETE FROM posts 				
			WHERE id=(:id)";
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$res->execute(
		array(
			':id' => $_GET['id'],  	
		)
	);
	
	$sql = "DELETE FROM posts_categories 				
			WHERE id_post=(:id)";
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$res->execute(
		array(
			':id' => $_GET['id'],  	
		)
	);
	
	header('Location:' .get_home_url().'admin/posts/?message=delete_success');
}