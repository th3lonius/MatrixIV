<?php

/* Template Name: Lineup Page */

get_header(); ?>
    
<?php
 
add_filter( 'posts_orderby' , 'posts_orderby_lastname' );

    $args = array(
        'post_type' => 'lineup',
        'posts_per_page' => 999
    );

    $lineup_query = new WP_Query( $args );

?>
    
    <article class="padded" id="lineup">
        
		<?php if ( $lineup_query->have_posts() ) : ?>
		
			<ul class="lineup">

			<?php while ( $lineup_query->have_posts() ) : $lineup_query->the_post(); ?>
              
                <?php $image = get_field('image'); ?>
                <?php if( !empty($image) ): 
 
					// vars
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
					$caption = $image['caption'];

					// thumbnail
					$size = 'thumbnail';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ]; ?>
                
				<li>
					<a href="<?php the_permalink(); ?>">
					    <div class="performer">
						    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                            <header>
                                <div class="content">
                                    <div class="meta"><?php the_field('location'); ?></div>
                                    <?php the_title( '<h3>', '</h3>' ); ?>
                                </div>
                            </header>
                        </div>
					</a>
				</li>
				
				<?php endif; ?>

			<?php endwhile; ?>
			
			<?php remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
			
			</ul>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


	</article><!-- #lineup -->

<?php get_footer(); ?>