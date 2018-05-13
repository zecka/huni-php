<?php
if(!empty($_POST)){
	
	if(!empty($_FILES)){
		$upload = file_upload();
	}else{
		$upload=array(
			'upload_ok' => 1,
			'alert'		=> '',
			'filename'	=> 0,
		);
	}
	
	if(!$upload['upload_ok']){
		$message=$upload['alert'];
	}else{
		try{
			global $db;
					
			$sql = "INSERT INTO posts (title, content, slug, date, thumb) 
								VALUES (:title, :content, :slug, :date, :thumb)";
			$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			
			$date = date('Y-m-d H:i:s', time());
			
			$res->execute(
				array(
					':title' => $_POST['title'], 
					':content' => $_POST['content'], 
					':slug' => slugify($_POST['title']), 
					':date' => $date,
					':thumb' => $upload['filename'],
				)
			);
			
			$id_post=$db->lastInsertId();
	
			
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
}


$post_data=array(
	'id'	=> '',
	'title'	=> '',
	'content'	=> '',
	'thumb'		=> '',
	'slug'		=> '',
	'date'		=> '',
	'user'		=> '',
	'categories'=>array(),
);