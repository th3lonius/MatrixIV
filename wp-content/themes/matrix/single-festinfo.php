<?php

/* Template Name: Single Staff Page */

get_header(); ?>
       
<article class="padded">
   
   <header>
        <?php previous_post_link( '%link', 'Older' ); ?>
        <?php next_post_link( '%link', 'Newer' );	?>
   </header>
    
	<section class="col-12-12 recent">
            
        <?php if( have_rows('member') ): ?>
               
        <?php while ( have_rows('member') ) : the_row(); ?>
                
        <?php $image = get_sub_field('photo'); ?>
        <?php if( !empty($image) ): 

            // vars
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];

            // thumbnail
            $size = 'thumbnail';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ]; ?>
                
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                   <h1><?php the_sub_field('name') ?></h1>

                <time><?php the_time('F j, Y'); ?> @ <?php the_time('g:i a'); ?></time>

                <?php the_content(); ?>
                
            <?php endif; ?>
               
        <?php endwhile; ?>

        <?php endif; ?>
                
                
	</section>
		
        <?php get_template_part( 'aside', 'single' ); ?>
	
</article>
	
<?php get_footer(); ?>