<?php
$route = trim($_GET['route'], '/');
$route_array=explode('/', $route);

if($route=='' || $route=='/'){
	include(get_views_dir().'index.php');
}elseif($route_array[0]=='admin'){
	if(file_exists(get_models_dir().$route.'.php')){
		include(get_models_dir().$route.'.php');
	}
	if(count($route_array)==1){
		include(get_views_dir().'admin/index.php');

	}elseif(file_exists(get_views_dir().'admin/'.$route.'.php')){
		include(get_views_dir().'admin/'.$route.'.php');
	}else{
		include(get_views_dir().'404.php');
	}

	
}elseif(file_exists(get_views_dir().$route.'.php')){
	if(file_exists(get_models_dir().$route.'.php')){
		include(get_models_dir().$route.'.php');
	}
	include(get_views_dir().$route.'.php');
}else{
	include(get_views_dir().'404.php');
}