<!doctype html>
 <html <?php language_attributes();?>>
 	<head>
 		<meta charset="<?php bloginfo('charset');?>">
 		<title><?php bloginfo('name'); ?><?php wp_title(' | ');?></title> 
        <meta name="description" content="<?php bloginfo('description');?>">
 		<?php wp_head(); ?>
 	</head>
 	<body <?php body_class( "moja-body-klasa" );?>> 
        <?php wp_nav_menu(array(
        'theme_location'=>'primary',
        'container'=>'nav',
        'container_class'=>'navbar',
        'menu_class'=>'menu-items-container'
        )); ?>

<!--štampam samo stavke menija unutar li taga-->  
<div class="moj-menu">
    <?php
        echo "<br>Štampam samo stavke menija bez ul, diva i klasa <br>";
        foreach ( fetch_menu_items('primary') as $navItem ) { /*fetch_menu_items je moja funkcija za izvlačenje stavki menija na            lokaciji koju prosledimo definisana u fajlu functions.php*/
            echo '<li><a href="'.$navItem->url.'">'.$navItem->title.'</a></li>';
        }
    ?>    
</div>
<div class="walker-klasa">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo get_site_url(); ?>">Awesome Theme</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php 
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'nav navbar-nav navbar-left',
						'walker' => new Walker_Nav_Primary()
					)
				);
				?>
			</div>
		</div><!-- /.container-fluid -->
</nav>
</div>
<p>	 <a href="<?php echo get_template_directory_uri().'/forma.php'?>">FORMA</a>
</p>