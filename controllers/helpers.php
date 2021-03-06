<?php 
/**
 * Find asset directory
 *
 * @param none
 * @return string url of assets directory.
 */
 
 

function get_home_url(){

	
	$protocol=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')? 'https' : 'http';
	$home_url=str_replace("\\",'/',"http://".$_SERVER['HTTP_HOST'].substr(getcwd(),strlen($_SERVER['DOCUMENT_ROOT'])));
	return $home_url.'/';
}

function get_assets_url(){
	return get_home_url().'assets/';
}
function get_upload_url(){
	return get_home_url().'assets/upload/';
}
function get_root_path(){
	return dirname(__DIR__).'/';
}
function get_views_dir(){
	return dirname(__DIR__).'/views/frontend/';
}
function get_models_dir(){
	return dirname(__DIR__).'/models/frontend/';
}
function get_controllers_dir(){
	return dirname(__DIR__).'/controllers/';
}


function get_admin_views_dir(){
	return dirname(__DIR__).'/views/admin/';
}
function get_admin_models_dir(){
	return dirname(__DIR__).'/models/admin/';
}


function get_header($zone='site'){
	if($zone=='admin'){
		include(dirname(__DIR__).'/views/admin/parts/header.php');
	}else{
		include(dirname(__DIR__).'/views/frontend/parts/header.php');
	}
}
function get_footer($zone='site'){
	if($zone=='admin'){
		include(dirname(__DIR__).'/views/admin/parts/footer.php');
	}else{
		include(dirname(__DIR__).'/views/frontend/parts/footer.php');
	}
}

function get_sidebar(){
	include(dirname(__DIR__).'/views/frontend/parts/sidebar.php');
}

function get_modal_delete(){
	include(dirname(__DIR__).'/views/admin/parts/modal-delete.php');
}


function get_route_last_element(){
	$route = trim($_GET['route'], '/');
	if($route=='' || $route=='/'){
		return 'home';
	}else{
		
		$route_array=explode('/', $route);
		$last=count($route_array) - 1;
		return $route_array[$last];
	}
	
}

function get_current_route(){
	$route = trim($_GET['route'], '/');
	return $route;
}

function is_category_listing(){
	$route = trim($_GET['route'], '/');
	$route_array=explode('/', $route);
	if($route_array[0]=='category'){
		return true;
	}else{
		return false;
	}
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}


require_once('formatting.php');
require_once('file_upload.php');
require_once('menus.php');

?>