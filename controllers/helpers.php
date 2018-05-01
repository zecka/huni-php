<?php 
/**
 * Find asset directory
 *
 * @param none
 * @return string url of assets directory.
 */
 
function get_assets_url(){
	return 'http://localhost:8888/__PHP/02-huni-php/assets/';
}
function get_root_path(){
	return dirname(__DIR__).'/';
}
function get_views_dir(){
	return dirname(__DIR__).'/views/';
}
function get_models_dir(){
	return dirname(__DIR__).'/models/';
}
function get_header(){
	include(dirname(__DIR__).'/views/header.php');
}
function get_footer(){
	include(dirname(__DIR__).'/views/footer.php');
}
function get_home_url(){
	$home_url=str_replace("\\",'/',"http://".$_SERVER['HTTP_HOST'].substr(getcwd(),strlen($_SERVER['DOCUMENT_ROOT'])));
	return $home_url;
}
?>