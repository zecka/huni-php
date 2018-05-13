<?php
function file_upload(){
		
	$target_dir = get_root_path()."assets/upload/";
	
	$target_file = $target_dir . slugify_filename(basename($_FILES["image_field"]["name"]));
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["image_field"]["tmp_name"]);
	    if($check !== false) {
	        $alert = "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        $alert = "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    $alert = "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["image_field"]["size"] > 5000000) {
	    $alert = "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $alert = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $alert = "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		
	    if (move_uploaded_file($_FILES["image_field"]["tmp_name"], $target_file)) {
	        $alert = "The file ". basename($target_file). " has been uploaded.";
	    } else {
	        $alert = "Sorry, there was an error uploading your file.";
	    }
	}
	
	
	$return=array(
		'filename' => basename($target_file),
		'upload_ok' => $uploadOk,
		'alert'	=> $alert,	
	);
	
	return $return;
}
?>