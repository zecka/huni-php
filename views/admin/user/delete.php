<?php
if(empty($_GET['id'])){
	header('Location:' .get_home_url().'admin/users/?message=unknow_error');
}

if(!empty($_GET['id'])){
	global $db;
	$sql = "DELETE FROM MyGuests WHERE id=3";

	$sql = "DELETE FROM users 				
			WHERE id=(:id)";
		
	
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$res->execute(
		array(
			':id' => $_GET['id'],  	
		)
	);
	
	header('Location:' .get_home_url().'admin/users/?message=delete_success');
}