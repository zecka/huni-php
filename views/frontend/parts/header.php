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
		<header class="inverted primarybg">
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
							<?php include(get_views_dir().'parts/menu.php'); ?>
						</nav>
						<nav class="secondary">
							<a href="#" class="button">Shop</a>
							<a href="#" class="button alt">Login</a>							
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
			<section id="pageTitle">
				<div class="container">
					<h1>Page Title</h1>
					ICI LE FIL D'ARIANNE
				</div>
			</section>
