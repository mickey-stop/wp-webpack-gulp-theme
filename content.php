<div class="post-item">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1>','</h1>' );?></a>
        <small>Posted on: <?php the_time('F j, Y'); ?>, in <?php the_category(); ?></small>
        <?php 
        the_post_thumbnail('post-thumbnail',['class'=>'full-width-image']);
        ?>
        <?php the_content(); ?>
</div>