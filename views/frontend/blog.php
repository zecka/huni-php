<?php get_header(); ?>

<div class="container">
	<div class="row">
	
	<main class="col-9">

	<div class="articles-list">

<?php 

$posts = get_posts();

foreach ($posts as $key => $post): ?>
	
	<article class="clearfix">
		<figure>
			<img src="<?php echo $post["thumb"]; ?>">
		</figure>
		<div class="article-excerpt">
			<h4><?php echo $post["title"]; ?></h4>
			<p><?php echo $post["content"]; ?></p>
			<div class="article-footer clearfix">
				<div class="article-buttons">
					<a href="" class="button">Explore more</a>
					<span>
						<?php
						$comments=get_comments_by_id($post["id"]);
						 
						if(count($comments)>1){
							echo count($comments)." Comments";
						}
						else if(count($comments)==1){
							echo "1 Comment";
						}
						else{
							echo("No comment");
						}
					?>
				</span>
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
	</main>

	<?php get_sidebar(); ?>

	</div>
	
</div>

<?php get_footer(); ?>
