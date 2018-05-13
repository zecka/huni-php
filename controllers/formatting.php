<?php

function slugify_filename($filename){
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$newname=explode('.', $filename);
	$last_key=count($newname) - 1;
	unset($newname[$last_key]);
	$newname=implode('', $newname);
	return slugify($newname).'.'.$ext;
	
}
function slugify($text){
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

