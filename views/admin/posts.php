<?php get_header('admin'); ?>
<h2>Articles</h2>

<table>
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
					<a class="btn" href="<?php echo get_home_url(); ?>admin/post/edit?id=<?php echo $post['id'] ?>">
						<i class="fa fa-edit"></i>
						Editer
					</a>
					<a class="btn" href="<?php echo get_home_url(); ?>admin/post/delete?id=<?php echo $post['id'] ?>">
						<i class="fa fa-trash"></i>
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