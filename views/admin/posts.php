<?php get_header('admin'); ?>
<div class="title-section">
	<h2>Articles</h2>
	<a class="btn btn-primary" href="<?php echo get_home_url() ?>admin/post/add">Ajouter un article</a>
</div>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Categories</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$posts=get_posts(); 
		foreach($posts as $post): ?>
			
			<tr>
				<td><?php echo $post['id']; ?></td>
				<td><?php echo $post['title']; ?></td>
				<td><?php list_post_categories($post['id']); ?></td>
				<td>
					<a class="btn btn-primary" href="<?php echo get_home_url(); ?>admin/post/edit?id=<?php echo $post['id'] ?>">
						<i class="material-icons">edit</i>
						Modifier
					</a>
					<button 
						data-link="<?php echo get_home_url(); ?>admin/post/delete?id=<?php echo $post['id'] ?>" 
						data-title="<?php echo $post['title'] ?>"
						type="button" 
						class="btn btn-danger btn-delete" 
						data-toggle="modal" 
						data-target="#modal_delete">
							<i class="material-icons">delete</i>
							Supprimer
					</button>
				</td>
			</tr>
			
		<?php	
		endforeach;
		?>
	</tbody>
</table>
<?php get_modal_delete(); ?>
<?php get_footer('admin'); ?>