<?php

/* Template Name: Single Page */

get_header(); ?>
       
<span>I AM SINGLE</span>
<article class="padded updates">
   
   <header>
        <?php previous_post_link( '%link', 'Older' ); ?>
        <?php next_post_link( '%link', 'Newer' );	?>
   </header>
    
	<section class="col-12-12 recent">
               
            <?php while ( have_posts() ) : the_post(); ?>
                
            <?php
                $image = get_field('image');
                $size = 'large';
            ?>
                
                    <?php if( $image ): ?>
                        <?php echo wp_get_attachment_image( $image, $size ); ?>
                    <?php endif; ?>
                    <?php the_title( '<h3>', '</h3>' ); ?>

                <time><?php the_time('F j, Y'); ?> @ <?php the_time('g:i a'); ?></time>

                <?php the_content(); ?>
                
            <?php endwhile; ?>
                
	</section>
		
        <?php get_template_part( 'aside', 'single' ); ?>
	
</article>
	
<?php get_footer(); ?>