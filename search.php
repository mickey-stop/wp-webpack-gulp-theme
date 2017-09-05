<?php get_header(); ?>
<?php 
    var_dump($_GET['s']);
    if($_GET['s'] && !empty($_GET['s']))
    {
        $text = $_GET['s'];
        echo $text;        
    }
    if($_GET['category'] && !empty($_GET['category']))
    {
        $cat = $_GET['category'];
        echo $cat;        
    }
    echo "GET promenljive su s=".$text." i CAT=".$cat;
?>

<!--Pravimo upit koji će pretraživati i obične postove i postove tipa flower a kako sam u drodown-u stavio i kategorije
i namene (custom kategorije za flower), upit će izbaciti postove ako im je bilo kategorija ili namena
jednaka vrednosti dropdown-a koju smo poslali sa index strane.-->
<?php $query=new WP_Query(array(
    's'=>$text,
    'posts_per_page'=>20, 
    'post_type'=>array('post', 'flower'),
    'tax_query' => array(
        'relation' => 'OR',
        array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $cat,
        'include_children' => true,
        'operator' => 'LIKE'
        ),
        array(
        'taxonomy' => 'namena',
        'field' => 'slug',
        'terms' => $cat,
        'include_children' => true,
        'operator' => 'LIKE'
        )
    )
    )); ?>
<?php if($query->have_posts()):while($query->have_posts()):$query->the_post(); ?>
<?php get_template_part('content'); ?>
<?php echo get_post_meta( get_the_ID(), 'price', true ) ?>
<?php  echo get_field('price'); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>