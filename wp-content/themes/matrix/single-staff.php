<?php

/* Template Name: Single Staff */

get_header(); ?>
       
<article class="padded">
   
    <header>
        <?php previous_post_link( '%link', '%title' ); ?>
        <?php next_post_link( '%link', '%title' );	?>
    </header>
    
    <?php while ( have_posts() ) : the_post(); ?>

    <section class="col-6-12">
    
        <?php $image = get_field('photo'); ?>
        <?php if( !empty($image) ): 

            // vars
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];

            // thumbnail
            $size = 'medium';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ]; ?>

            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                
        <?php endif; ?>

    </section>
    
    <section class="col-6-12 recent">
        
        <h3><?php the_title() ?></h3>
        <div class="meta"><?php the_field('position') ?></div>
        <?php the_content() ?>        

    </section>
    
    <?php endwhile; ?>
	
</article>
	
<?php get_footer(); ?>