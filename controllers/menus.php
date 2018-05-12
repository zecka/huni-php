<?php 
function get_menu_items(){
	$items=array(
		array(
			'name'	 	=> 'Accueil',
			'route'	 	=> '',
		),
		array(
			'name'	 	=> 'Portfolio',
			'route'	 	=> 'portfolio',
		),
		array(
			'name'		=> 'Blog',
			'route'		=> 'blog',
			'submenu'	=> array(
				array(
					'name'		=>'Catégorie 1',
					'route'		=> 'category/cat1',				
				),
				array(
					'name'=>'Catégorie 2',
					'route' => 'category/cat2',				
				),
			)		
		),
		array(
			'name'	=> 'Contact',
			'route'	=> 'contact',			
		),
	);
	
	$route = get_current_route();
	set_active_class($route, $items);	
	return $items;
	
}


/*
 * Function who set active item based on route
 * @params route and items(reference)
 * @return void
*/
function set_active_class($route, &$items) {
	foreach ($items as $key => $item):
		$items[$key]['class']='menu__item';
		if ($item['route'] === $route) {
			$items[$key]['class'].=' current';
		}
	
		if(array_key_exists('submenu', $item)){
			$items[$key]['class'].=' has-children';
	
			foreach($item['submenu'] as $subkey => $sub_item):
				if($sub_item['route']===$route){
					$items[$key]['class'].=' current-parent';
					$items[$key]['submenu'][$subkey]['class'].=' current';
				}
			endforeach;
		}
	endforeach;
}

function display_menu(){
	
	$items=get_menu_items();
	
	echo '<ul class="menu">';
	foreach($items as $item): ?>
		<li class="<?php echo $item['class']; ?>">
			<a href="<?php echo get_home_url().$item['route']; ?>">
				<?php echo $item['name']; ?>
			</a>
			
			
			<?php if(array_key_exists('submenu', $item)): ?>
				<ul class="sub-menu">
					<?php foreach($item['submenu'] as $sub_item): ?>
						<li class="<?php echo $sub_item['class']; ?>">
							<a href="<?php echo get_home_url().$sub_item['route']; ?>">
								<?php echo $sub_item['name']; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			
			
		</li>
	<?php
	endforeach;
	echo '</ul>';
	
}
	
?>