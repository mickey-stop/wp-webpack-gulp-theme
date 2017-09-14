<?php get_header(); ?>
<?php
    //dodajemo search formu
    get_search_form( );
    echo "Početna jeste: ".is_front_page();
?>  
    <div class="posts">
	<?php if(have_posts()): ?>
    <?php while(have_posts()):the_post(); ?>
        <?php get_template_part('content',get_post_format()); ?>
    <?php endwhile; ?>
    <div class="navigacija">
        <?php next_posts_link('Older posts'); ?>
        <?php previous_posts_link('Newer posts') ?>
    </div>
    <div class="pagination">
        <?php moja_numeric_posts_nav($wp_query); ?>
        <?php  echo "Trenutna strana je ".$paged; //daje broj trenutne strane?>
        <?php echo " od ".intval( $wp_query->max_num_pages ); //daje ukupan broj strana kod paginacije?>
    </div>
  <?php else: ?>
    <p><?php __('No posts found'); ?></p>
  <?php endif; ?>

  <h4>Cveće</h4>
  <?php 
    $args=array('post_type'=>'flower');
    $novi_upit=new WP_Query( $args ) ;
      ?>


  <?php //Ovaj blok štampa sve registrovane post type-ove
    foreach ( get_post_types( '', 'names' ) as $post_type ) {
    echo '<p>' . $post_type . '</p>&nbsp';
    }
  ?>

  <?php if($novi_upit->have_posts() && $paged==1):while($novi_upit->have_posts()):$novi_upit->the_post(); ?>
  
  <?php get_template_part('content','flower'); ?>
  <?php endwhile; wp_reset_postdata();?>
  <?php endif; ?>
</div>  

<?php get_sidebar();?>
<?php get_sidebar('second');?>
<?php get_footer(); ?>