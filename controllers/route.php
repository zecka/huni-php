<?php
$route = trim($_GET['route'], '/');
$route_array=explode('/', $route);

/* REDIRECT BAD ROUTE */
// if route start with /views only redirect to same url without /views part eg: /views/contact -> /contact
if($route_array[0]=='views'){
	$newroute=$route_array;
	unset($newroute[0]);
	$newroute=get_home_url().implode('/', $newroute);
	header('Location: ' . $newroute  );
}
// if routain start with /controllers or /models
elseif(in_array($route_array[0], array('controllers','models','blog-item')) ){
	header('Location: ' . get_home_url()  );
}
// if no route is found it means that it is the home.
if($route=='' || $route=='/'){
	include(get_views_dir().'index.php');
}
// LOGIN PAGE DIRECT ACCESS
elseif($route_array[0]=='login'){
	include(get_admin_views_dir().'login.php');
}
// LOUGOUT PAGE DIRECT ACCESS
elseif($route_array[0]=='logout'){
	include(get_admin_views_dir().'logout.php');
}
// CLASSIC PAGE ACCESS
// First check if target page exist on views
elseif(file_exists(get_views_dir().$route.'.php')){
	
	// If model of target page exist include it
	if(file_exists(get_models_dir().$route.'.php')){
		include(get_models_dir().$route.'.php');
	}
	include(get_views_dir().$route.'.php');
}
// Blog item page
elseif($route_array[0]=='blog' && count($route_array)>1){
	
	include(get_models_dir().'blog-item.php');
	include(get_views_dir().'blog-item.php');
}
// ADMIN PAGE DIRECT ACCESS
elseif($route_array[0]=='admin'){
	
	
	$admin_route=$route_array;
	unset($admin_route[0]);
	$admin_route=implode('/', $admin_route);

	// CHECK IF USER IS LOG
	if(user_is_log()){
		
		/*
		 * INCLUDE MODEL
		*/
		// Check if target page existe in modele and include it if exist
		if(file_exists(get_admin_models_dir().$route.'.php')){
			include(get_admin_models_dir().$route.'.php');
		}
		
		/*
		 * INCLUDE VIEWS
		*/
		// user is on root/admin so include de dashboard page (views/admin/index.php)
		if(count($route_array)==1 && $route_array[0]=='admin'){
			include(get_admin_views_dir().'index.php');
		}
		// Otherwise check if target page existe in views and display it if exist
		elseif(file_exists(get_admin_views_dir().$admin_route.'.php')){
			include(get_admin_views_dir().$admin_route.'.php');
		}
		// TARGET PAGE NOT EXIST DISPLAY ERROR 404
		else{
			include(get_views_dir().'404.php');
		}
	}
	// USER IN NOT LOG SO REDIRECT TO LOGIN PAGE
	else{
		header('Location: ' . get_home_url().'/login'  );
	}
	
}else{
	include(get_views_dir().'404.php');
}