<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo get_assets_url() ?>lib/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_assets_url() ?>css/style.css">
</head>
<body class="header-type-default">
	<div id="wrapper">
		<?php
		$header_class='inverted primarybg';
		if(get_current_route()==''){
			$header_class.=' transparent';
		}
		?>
		<header class="inverted primarybg<?php echo $header_class; ?>">
			<div class="header-wrap">
				<div class="container clearfix">
					<a class="logo logo-mobile" href="<?php echo get_home_url(); ?>">
						<img src="<?php echo get_assets_url() ?>img/huni-logo-white.svg" />
					</a>
					<div class="header-flex">
						<a class="logo" href="<?php echo get_home_url(); ?>">
							<img src="<?php echo get_assets_url() ?>img/huni-logo-white.svg" />
						</a>
						<nav class="primary">
							<?php display_menu(); ?>
						</nav>
						<nav class="secondary">
							<a href="#" class="button">Shop</a>
							<a href="<?php get_home_url(); ?>login" class="button alt">Login</a>							
							<?php include(get_views_dir().'parts/search.php'); ?>
						</nav>
					</div>
					<a class="hamburger-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
			</div>
		</header>
		<?php if(get_current_route() !==''): ?>
		<section id="pageTitle">
			<div class="container">
				<?php 
					global $data_post;
					if(isset($data_post)){ 
						$title=$data_post['title'];
					}else{
						$title=ucfirst(get_route_last_element());
					}
				?>
				
				<h1><?php echo $title; ?></h1>
				ICI LE FIL D'ARIANNE
			</div>
		</section>
		<?php endif; ?>
