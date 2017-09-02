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

//Dodavanje paginacije
//Add numeric navigation
function moja_numeric_posts_nav($my_query) {

	if( is_singular() )
		return;

	//global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $my_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $my_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";
}
//Limit number of posts on home page
//Da bi paginacija ispravno radila mora se odrediti broj postova po strani za svaku stranu za koju želimo posebnu paginaciju
add_action( 'pre_get_posts',  'change_posts_number_home_page'  );
function change_posts_number_home_page( $query ) {

   if ($query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 6 );

    return $query;
    }
	if(is_category( 'voce' )){
		$query->set('posts_per_page',4);
	}
}