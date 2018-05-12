<?php
if(!empty($_POST)){
	
	echo '<pre>'; echo print_r($_POST); echo '</pre>';
	exit;
	global $db;
			
	$sql = "INSERT INTO posts (title, content, slug, date) 
						VALUES (:title, :content, :slug, :date)";
	$res= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	
	$date = date('Y-m-d H:i:s', time());
	
	$res->execute(
		array(
			':title' => $_POST['title'], 
			':content' => $_POST['content'], 
			':slug' => $_POST['slug'], 
			':date' => $date,
		)
	);
	
	header('Location:' .get_home_url().'admin/posts/?message=add_success');
}

?>
<?php get_header('admin'); ?>
<!-- DOCUMENTATION HTML BOOTSTRAP MATERIAL https://demos.creative-tim.com/material-kit/docs/2.0/components/badge.html  --> 
<h2>Ajouter un article</h2>
<form method="post">
	
	<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" name="categories[1]" type="checkbox" id="inlineCheckbox1" value="option1"> 1
    <span class="form-check-sign">
        <span class="check"></span>
    </span>
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" name="categories[2]" type="checkbox" id="inlineCheckbox2" value="option2"> 2
    <span class="form-check-sign">
        <span class="check"></span>
    </span>
  </label>
</div>
<div class="form-check form-check-inline disabled">
  <label class="form-check-label">
    <input class="form-check-input" name="categories[3]" type="checkbox" id="inlineCheckbox3" value="option3" disabled> 3
    <span class="form-check-sign">
        <span class="check"></span>
    </span>
  </label>
</div>




	
	<div class="field form-group">
		<label class="bmd-label-floating" for="title">Titre</label>
		<input id="title" class="form-control" type="text" name="title" required>
	</div>
	
	<div class="field form-group">
		<label for="content">Contenu</label>
		<textarea class="form-control" id="content" name="content" rows="3"></textarea>
	</div>


	<div class="field-group ">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		<a class="btn" href="<?php echo get_home_url() ?>admin/posts">Annuler</a>
	</div>
</form>


<?php get_footer('admin'); ?>