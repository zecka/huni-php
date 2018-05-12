<?php get_header(); ?>
<div class="container">
	<div class="row">
		<main class="col-9">
			<div class="article-content">
				<?php echo $data_post['content']; ?>
			</div>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>