<?php get_header(); ?>
<div class="posts">
<?php 
    $currentPage=(get_query_var('paged'))?get_query_var('paged'):1;
    echo "<div style='width:100%'>Ovo je category-voce template a trenutna strana je: ".$currentPage."</div>";
    $args=array(
        'category_name'=>'voce',
        'posts_per_page'=>4,
        'paged'=>$currentPage
    );
    $result=new WP_Query( $args ); 
?>
	<?php if($result->have_posts()): ?>
    <?php while($result->have_posts()):$result->the_post(); ?>
        <?php get_template_part('content',get_post_format()); ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="pagination">
        <?php moja_numeric_posts_nav($result); ?>
        <?php  echo "Trenutna strana je ".$paged;//$currentPage; //daje broj trenutne strane?>
        <?php echo " od ".intval( $result->max_num_pages ); //daje ukupan broj strana kod paginacije?>
    </div>
    <?php wp_reset_postdata();?>
<?php get_footer(); ?>