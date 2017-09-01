
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('obican-post'); ?>>
				
					<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
					
					<?php if( has_post_thumbnail() ): ?>
						
						<?php the_post_thumbnail('thumbnail'); ?>
				
					<?php endif; ?>
					
					<small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
					
					<?php the_content(); ?>
					
					<hr>
									
				</article>
