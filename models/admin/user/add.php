<?php
if(!empty($_POST)){
	global $db;
			
	$sql = "INSERT INTO users (email, username, firstname, lastname, password, bio, role, date) 
						VALUES (:email, :username, :firstname, :lastname, :password, :bio, :role, :date)";
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	
	$date = date('Y-m-d H:i:s', time());
	
	$res->execute(
		array(
			':email' => $_POST['email'], 
			':username' => $_POST['username'], 
			':firstname' => $_POST['firstname'], 
			':lastname' => $_POST['lastname'], 
			':password' => password_hash($_POST['password'], PASSWORD_BCRYPT), 
			':bio' => $_POST['bio'], 
			':role' => $_POST['role'], 	
			':date' => $date,
		)
	);
	
	header('Location:' .get_home_url().'admin/users/?message=add_success');
}

$user_data=array(
	'id'		=> '',
	'lastname' 	=>'',
	'firstname' => '',
	'username' 	=> '',
	'email'		=>'',
	'password'	=>'',
	'bio'		=> '',
	'role'		=> 'admin',
	'date'  	=> ''
);