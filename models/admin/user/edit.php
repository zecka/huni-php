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