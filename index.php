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
  <?php else: ?>
    <p><?php __('No posts found'); ?></p>
  <?php endif; ?>
</div>
<?php get_sidebar();?>
<?php get_sidebar('second');?>
<?php get_footer(); ?>