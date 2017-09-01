<?php
//uključivanje stilova i skripti
function webpack_gulp_theme_script_enqueue() {
	
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/app/css/main.css', array(), '1.0.0', 'all');
	//wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
	
}
add_action( 'wp_enqueue_scripts', 'webpack_gulp_theme_script_enqueue');

//dodavanje menija
function webpack_gulp_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primarni menu');
	//register_nav_menu('secondary', 'Footer Navigation');
	
}
add_action('init', 'webpack_gulp_theme_setup');

//moja funkcija za izvlačenje stavki menija kao objekata
function fetch_menu_items($location_name){
    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
                                           // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
    //var_dump($menuLocations);

    $menuID = $menuLocations[$location_name]; // Get the *primary* menu ID
    //var_dump($menuID);

    $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
    //var_dump($primaryNav);
    //sada ispisujemo stavke menija koji su objekti sa određenim propertijima
    return $primaryNav;
}
//uključivanje theme support
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside'));

//kreiranje i omogućavanje widget oblasti
function webpack_gulp_widget_setup() {
	
	register_sidebar(
		array(	
			'name'	=> 'Moj sidebar',
			'id'	=> 'moj-sidebar1',
			'class'	=> 'custom',
			'description' => 'Moj Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
    //dodajem još jedan sidebar
    register_sidebar(
		array(	
			'name'	=> 'Moj sidebar2',
			'id'	=> 'moj-sidebar2',
			'class'	=> 'custom',
			'description' => 'Moj Standard Sidebar 2',
            'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
}
add_action('widgets_init','webpack_gulp_widget_setup');
//uključivanje html5 koda za search form
add_theme_support('html5', array('search-form'));