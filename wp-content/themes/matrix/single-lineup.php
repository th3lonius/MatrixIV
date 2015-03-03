<?php

/* Template Name: Lineup Page */

get_header(); ?>
       
    <article class="padded">
		
		<?php if ( have_posts() ) : ?>
		
		<section class="col-8-12">

			<?php while ( have_posts() ) : the_post(); ?>					

			<header>		
            <?php $image = get_field('image'); ?>
            <?php if(get_field('video')):?>
              
                <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src="http://www.youtube.com/embed/<?php the_field('video'); ?>?autoplay=1" frameborder='0' allowfullscreen></iframe></div>
            
            <?php elseif( !empty($image) ): 

                // vars
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // thumbnail
                $size = 'medium';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ]; ?>
					
				<img class="target-image" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                            
            <?php else : ?>
								
            <?php endif; ?>
				
				<?php if( have_rows('media') ): ?>
				    
				    <div class="performer-media">
				    
				    <?php while ( have_rows('media') ) : the_row(); ?>
				    
                        <?php if(get_sub_field('website')):?>
                            <a href="<?php the_sub_field('website'); ?>">Website</a>
                        <?php endif; ?>
                        <?php if(get_sub_field('twitter')):?>
                            <a href="https://twitter.com/<?php the_sub_field('twitter'); ?>">Twitter</a>
                        <?php endif; ?>
				    
				    <?php endwhile; ?>
				    
                    </div>
				    
				<?php endif; ?>
				
			</header>
				
				<p><?php the_field( 'bio' ); ?></p>

			<?php endwhile; ?>
			
		</section>

		<?php else : ?>
			
			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
	<?php get_template_part( 'aside', 'lineup' ); ?>
	
	</article>
	
<?php get_footer(); ?>