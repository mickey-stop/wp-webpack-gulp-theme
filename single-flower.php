<?php get_header(); ?>
<?php echo "Template je: ".basename( __FILE__ ); ?>


<?php 

		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<?php get_template_part( 'content', 'flower' ); ?>
                <!--Adding comment-->
                <div class="comment-block"> 
                    <?php 
						if( comments_open() ){ 
							comments_template(); 
						} else {
							echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
						}
						
				    ?>
				</div>

			<?php endwhile;?>
			<!--Adding navigation-->
            <div class="navigacija">
            <?php
                previous_post_link();
                next_post_link();
            ?>
            </div>
		<?php endif;?>
		<?php get_footer(); ?>
				
		