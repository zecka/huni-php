<?php
if(empty($_POST) && empty($_GET['id'])){
	header('Location:' .get_home_url().'admin/posts/?message=unknow_error');
}

$id_post=$_GET['id'];
$post_data=get_post_by_id($id_post);

// Vérify if an image is has been selected
if(!empty($_FILES['image_field']['name'])){
	$upload = file_upload();
	// If a previous image exist and the new image is upload successfull 
	// -> delete previous then replace by the new image
	if($post_data['thumb']!='' && $upload['upload_ok']){
		$file=get_root_path().'assets/upload/'.$post_data['thumb'];
		if (file_exists($file)) {
			unlink($file);
		}	
	}
	
	
}else{
	$upload=array(
		'upload_ok' => 1,
		'alert'		=> '',
		'filename'	=> $post_data['thumb'],
	);
	
}

if(!$upload['upload_ok'] || empty($_POST)){
	$message=$upload['alert'];
	$message_type="alert";
}else{

	try{
		global $db;
		
		$sql = "UPDATE posts 
				SET 
					title=(:title), 
					content=(:content), 
					slug=(:slug),
					thumb=(:thumb) 
				WHERE id=(:id)";
		
		
		
		$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		
		
		$res->execute(
			array(
				':title' => $_POST['title'], 
				':content' => $_POST['content'], 
				':slug' => slugify($_POST['title']), 
				':thumb' => $upload['filename'],
				':id'	=> $id_post,
			)
		);
				
		
		
		/* DELETE CATEGORIE OF POST BEFORE UPDATE */
		$sql = "DELETE FROM posts_categories 				
				WHERE id_post=(:id_post)";
		$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$res->execute(
			array(
				':id_post' => $id_post,  	
			)
		);

		
		if(isset($_POST['categories'])){
			
			foreach($_POST['categories'] as $category):
				
				$sql = "INSERT INTO posts_categories (id_post, id_category) 
							VALUES (:id_post, :id_category)";
				$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				
				$res->execute(
					array(
						':id_post' => $id_post, 
						':id_category' => $category, 
					)
				);
				
			endforeach;
		}
		
		header('Location:' .get_home_url().'admin/posts/?message=add_success');
	} catch(PDOExecption $e) { 
		$db->rollback(); 
		print "Error!: " . $e->getMessage() . "</br>"; 
	} 
}
