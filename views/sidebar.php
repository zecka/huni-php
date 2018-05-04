<aside class="col-3">
	<div id="sidebar">
		<div id="search-4" class="widget widget_search">
			<form method="get" id="searchform" class="searchform">
				<input type="text" class="field" name="s" id="s" placeholder="Search">
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>
		<div id="categories-8" class="widget widget_categories">
			<h4 class="widgettitle">Categories</h4>
			<ul>
		
			<?php 
			
			$categories = get_categories();

			foreach ($categories as $key => $category): ?>
			
				<li><a><?php echo $category["title"];?></a></li>

			<?php endforeach ?>


			</ul>
		</div>
	</div>
</aside>