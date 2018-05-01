<?php
$route = trim($_GET['route'], '/');

if($route=='' || $route=='/'){
	include(get_views_dir().'index.php');
}elseif(file_exists(get_views_dir().$route.'.php')){
	if(file_exists(get_models_dir().$route.'.php')){
		include(get_models_dir().$route.'.php');
	}
	include(get_views_dir().$route.'.php');
}else{
	include(get_views_dir().'404.php');
}