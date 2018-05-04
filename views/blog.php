<?php get_header(); ?>

<div class="container">
	<div class="articles-list">

<?php 

$posts = get_posts();
$img = get_upload_url();

foreach ($posts as $key => $post): ?>
	
	<article class="clearfix">
		<figure>
			<img width="200px" height="200px" src="<?php echo get_upload_url().$post["id"]; ?>.jpg">
		</figure>
		<div class="article-excerpt">
			<h4><?php echo $post["title"]; ?></h4>
			<p><?php echo $post["content"]; ?></p>
			<div class="article-footer clearfix">
				<div class="article-buttons">
					<a href="" class="button">Explore more</a>
				</div>
				<div class="social-like">
					<a href="" class="fb-like btn-social">Share</a>
					<a href="" class="tweet btn-social">Tweet</a>
				</div>
			</div>
		</div>
	</article>

<?php endforeach; ?>
	
	</div>
</div>

<?php get_footer(); ?>