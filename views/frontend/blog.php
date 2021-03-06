<?php get_header(); ?>

<div class="container">
	<div class="row">
	
	<main class="col-9">

	<div class="articles-list">

<?php 
if(is_category_listing()){
	$current_cat_slug=get_route_last_element();
	$current_cat=get_category_by_slug($current_cat_slug);
	$posts=get_category_posts($current_cat['id']);

}else{
	$posts = get_posts();
}


foreach ($posts as $key => $post): ?>
	
	<article class="clearfix">
		<figure>
			<img src="<?php echo get_upload_url().$post["thumb"]; ?>">
		</figure>
		<div class="article-excerpt">
			<h4><?php echo $post["title"]; ?></h4>
			<p><?php echo $post["content"]; ?></p>
			<div class="article-footer clearfix">
				<div class="article-buttons">
					<a href="<?php echo get_home_url().'blog/'.$post['slug']; ?>" class="button">Explore more</a>
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
