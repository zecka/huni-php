
<div class="field form-group">
	<label class="bmd-label-floating" for="title">Titre</label>
	<input id="title" class="form-control" type="text" name="title" value="<?php echo $post_data['title']; ?>" required>
</div>


<hr class="break">

<div class="field-large form-group">
	<label>Catégories</label><br>
	<?php foreach(get_categories() as $key => $category):	 ?>		
	<div class="form-check form-check-inline">
		<label class="form-check-label">
			<input 
				class="form-check-input" 
				type="checkbox" 
				name="categories[<?php echo $category['id'] ?>]" 
				value="<?php echo $category['id'] ?>"
				<?php if(in_array_r($category['id'], $post_data['categories'])){ echo ' checked';} ?>
			>
				<?php echo $category['title']; ?>
			<span class="form-check-sign">
				<span class="check"></span>
			</span>
		</label>
	</div>
	<?php endforeach; ?>
	
</div>




<div class="field-large form-group">
	<label for="content">Contenu</label>
	<textarea class="form-control tinymce" id="content" name="content" rows="10"><?php echo $post_data['content']; ?></textarea>
</div>



<div class="field-large form-group">
	<h4 class="title">Image de l'article</h4>
	<div class="fileinput fileinput-new text-center" data-provides="fileinput">
		<div class="fileinput-new thumbnail">
			<?php if($post_data['thumb']==''){ ?>
				<img src="<?php echo get_assets_url() ?>/img/image_placeholder.jpg" alt="...">
			<?php }else{ ?>
				<img src="<?php echo get_upload_url().$post_data['thumb']; ?>" alt="...">
			<?php } ?>
		</div>
		<div class="fileinput-preview fileinput-exists thumbnail"></div>
		<div>
			<span class="btn btn-rose btn-round btn-file">
				<span class="fileinput-new">Selectionner une image</span>
				<span class="fileinput-exists">Changer</span>
				<input type="file" name="image_field">
			</span>
			<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
		</div>
	</div>
</div>