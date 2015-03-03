<?php

/* Template Name: Single Events */

get_header(); ?>
    
<article class="events">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <?php $image = get_field('event_photo'); ?>
    <?php if( !empty($image) ): 

        // vars
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        // thumbnail
        $size = 'large';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ]; ?>

    <figure style="background-image: url(<?php echo $url; ?>);">
        <!--<div class="sponsor">Sponsored by <?php $image = get_field('sponsor'); ?></div>-->
    </figure>

    <?php endif; ?>


    <section class="event-details">

        <?php get_template_part( 'aside', 'events' ); ?>

        <div class="abstract col-8-12">
            <?php get_template_part( 'module', 'event_meta' ); ?>
        </div>

    <?php endwhile; ?>

    </section>

</article>
    
<article class="padded">
    <section class="event-performers col-6-12">
       <header><h3 class="flag">Featuring</h3></header>
        <?php get_template_part( 'module', 'performers' ); ?>
    </section>

    <section class="col-6-12">
        <?php the_content(); ?>
    </section>
</article>
    
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	
<?php get_footer(); ?>