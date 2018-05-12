<?php get_header('admin'); ?>
<h2>Articles</h2>

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
					<a class="btn btn-primary" href="<?php echo get_home_url(); ?>admin/user/edit?id=<?php echo $user['id'] ?>">
						<i class="material-icons">edit</i>
						Modifier
					</a>
					<a class="btn btn-danger" href="<?php echo get_home_url(); ?>admin/user/delete?id=<?php echo $user['id'] ?>">
						<i class="material-icons">delete</i>
						Supprimer
					</a>
				</td>
			</tr>
			
		<?php	
		endforeach;
		?>
	</tbody>
</table>
<?php get_footer('admin'); ?>