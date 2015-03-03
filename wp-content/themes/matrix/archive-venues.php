<?php

/* Template Name: Venues Page */

?>

<?php
 
    $args = array(
        'post_type' => 'venues'
    );

    $venues_query = new WP_Query( $args );

?>

<?php if ( $venues_query->have_posts() ) : ?>

<section id="venues">

	<div id="venues_slider">

		<ul class="slides-container">

		<?php while ( $venues_query->have_posts() ) : $venues_query->the_post(); ?>

				<?php $image = get_field('venue_photo'); ?>
				<?php if( !empty($image) ): 

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

				<li>
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<h1>
						<?php the_title(); ?>
						<address><?php the_field('address')?></address>
					</h1>
				</li>

				<?php endif; ?>

		<?php endwhile; ?>

		</ul><!-- .slides-container -->

		<nav class="slides-navigation">
			<a href="#" class="next"></a>
			<a href="#" class="prev"></a>
		</nav>

	</div>

		<?php endif; ?>
	
</section>