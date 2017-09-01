<div class="post-item povrce">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1>','</h1>' );?></a>
        <small><?php the_category(); ?><?php the_tags(); ?></small>
        <?php the_post_thumbnail('post-thumbnail',['class'=>'full-width-image']);?>
        <?php the_content(); ?>
</div>