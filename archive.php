<?php get_header(); ?>
<?php
    the_archive_title('<h1 class="title">', '</h1>') 
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
</div>  
<?php get_sidebar();?>
<?php get_sidebar('second');?>
<?php get_footer(); ?>