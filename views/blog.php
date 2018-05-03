<?php get_header(); ?>

<div class="container">

<?php 

$posts = get_posts();

foreach ($posts as $key => $post): ?>
	
	<h2><?php echo $post["title"]; ?></h2>
	<p><?php echo $post["content"]; ?></p>

<?php endforeach; ?>

</div>

<?php get_footer(); ?>