<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HUNI | Admin</title>
	<link rel="stylesheet" href="<?php echo get_assets_url() ?>lib/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_assets_url(); ?>/css/admin.css">
</head>

<body>
	
	
	
<header>
	<div class="topbar">
		<ul>
			<li>
				<i class="fa fa-user"></i>
				<span><?php echo $_SESSION['username']; ?></span>
			</li>
			<li>
				<a href="<?php echo get_home_url() ?>logout">
					<i class="fa fa-sign-out"></i>
					<span>Déconnexion</span>
				</a>
			</li>
		</ul>
	</div>
	<nav class="primary-nav">
		<div class="logo">
			<img src="<?php echo get_assets_url() ?>img/lion-white.svg">
		</div>
		<?php 
		$admin_nav_parts=array(
			array(
				'slug' => 'posts',
				'icon' => 'fa-file-text-o',
				'name' => 'Articles'
			),
			array(
				'slug' => 'categories',
				'icon' => 'fa-file-text-o',
				'name' => 'Catégories'
			),
			array(
				'slug' => 'users',
				'icon' => 'fa-users',
				'name' => 'Utilisateurs'
			),
		); 
		?>
		<ul>
			<?php foreach($admin_nav_parts as $nav_item): ?>
			<li>
				<a href="<?php echo get_home_url(); ?>admin/<?php echo $nav_item['slug']; ?>">
					<i class="fa <?php echo $nav_item['icon']; ?>"></i>
					<span><?php echo $nav_item['name']; ?><span>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</header>