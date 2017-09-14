<?php 
    /*Template Name: Search*/
?>

<?php get_header(); ?>
<?php 
    
    if($_GET['s'] && !empty($_GET['s']))
    {
        $text = $_GET['s'];
        echo "Promenljiva s je: ".$text."<br>";        
    }
    if($_GET['category'] && !empty($_GET['category']))
    {
        $cat = $_GET['category'];
        echo "Promenljiva category je: ".$cat."<br>";        
    }
    else{
        $cat_obj=get_terms(array('taxonomy'=>array('category', 'namena')));
        $cat=array();
        foreach($cat_obj as $categ){
            array_push($cat,$categ->slug);
        }
    }
    echo "GET promenljive su s=".$text." i CAT=".$cat;
?>

<!--Do sledećeg komentara je tuđi kod da bi radio i s i tax_query-->
<?php  
class WP_Query_Taxonomy_Search {
    public function __construct() {
        add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
    }

    public function pre_get_posts( $q ) {
        if ( is_admin() ) return;

        $wp_query_search_tax_query = filter_var( 
            $q->get( 'search_tax_query' ), 
            FILTER_VALIDATE_BOOLEAN 
        );

        // WP_Query has 'tax_query', 's' and custom 'search_tax_query' argument passed
        if ( $wp_query_search_tax_query && $q->get( 'tax_query' ) && $q->get( 's' ) ) {
            add_filter( 'posts_groupby', array( $this, 'posts_groupby' ), 10, 1 );
        }
    }

    public function posts_groupby( $groupby ) {
        return '';
    }
}

new WP_Query_Taxonomy_Search();
?>

<!--Pravimo upit koji će pretraživati i obične postove i postove tipa flower a kako sam u drodown-u stavio i kategorije
i namene (custom kategorije za flower), upit će izbaciti postove ako im je bilo kategorija ili namena
jednaka vrednosti dropdown-a koju smo poslali sa index strane.-->
<?php $squery=new WP_Query(array(
    //'search_tax_query' => true,
    's'=>$text,
    'posts_per_page'=>20, 
    'post_type'=>array('post','flower'),
    'tax_query' => array(
        'relation' => 'OR',
        array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $cat,
        'include_children' => true,
        'operator' => 'IN'
        ),
        array(
        'taxonomy' => 'namena',
        'field' => 'slug',
        'terms' => $cat,
        'include_children' => true,
        'operator' => 'IN'
        ),
    ),
    ));?>

<?php if($squery->have_posts()):while($squery->have_posts()):$squery->the_post(); ?>
<?php get_template_part('content'); ?>
<?php echo "Cena je ".get_post_meta( get_the_ID(), 'price', true );//cena moze i kao u sledećem redu ?>
<?php // echo "Sa get_field('price') ".get_field('price'); ?>
<?php endwhile; 
wp_reset_postdata();
endif; ?>
<?php get_footer(); ?>