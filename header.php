<!doctype html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Awesome Theme</title>
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