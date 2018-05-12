<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>HUNI | Admin</title>
	<link rel="stylesheet" href="<?php echo get_assets_url() ?>lib/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	
	
    <!-- Material Kit CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	<?php $material_folder=get_assets_url().'lib/material-kit'; ?>
    <link rel="stylesheet" href="<?php echo $material_folder; ?>/assets/css/material-kit.css?v=2.0.3">
    
    <!-- ADMIN CSS -->
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
				'icon' => 'description',
				'name' => 'Articles'
			),
			array(
				'slug' => 'categories',
				'icon' => 'create_new_folder',
				'name' => 'Catégories'
			),
			array(
				'slug' => 'users',
				'icon' => 'people',
				'name' => 'Utilisateurs'
			),
		); 
		?>
		<ul>
			<?php foreach($admin_nav_parts as $nav_item): ?>
			<li>
				<a href="<?php echo get_home_url(); ?>admin/<?php echo $nav_item['slug']; ?>">
					<i class="material-icons"><?php echo $nav_item['icon']; ?></i>
					<span><?php echo $nav_item['name']; ?><span>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</header>
<main>