<?php 
/*
 * Model for users listing in admin part
 */

if(!empty($_GET['message'])){
	
	
	if($_GET['message']=='add_success'){
		$message='Utilisateur ajouté avec succès';
		$message_type='success';
	}
	
	
}