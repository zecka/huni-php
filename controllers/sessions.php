<?php
session_start();
function user_is_log(){
	if (isset($_SESSION['id']) AND isset($_SESSION['email'])){
	    return 1;
	}else{
		return 0;
	}
	
};