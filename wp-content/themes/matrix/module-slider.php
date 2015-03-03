<!-- #SLIDER -->
<article class="slider">

<header><h3>Scenes from 2014</h3></header>

<?php

    $args = array(
        'post_type' => 'gallery'
    );

    $the_query = new WP_Query( $args );

?>

	<?php if ( $the_query->have_posts() ) : ?>

		<div id="slides">

            <ul class="slides-container">
                
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <!-- Slider -->
			<?php if( have_rows('images') ) : ?>

                <?php while( have_rows('images') ): the_row(); 

                $image = get_sub_field('photo');

                ?>
                
                <li>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                </li>
                
                <?php endwhile; ?>
                
				<?php endif; ?>

			<?php endwhile; ?>

            </ul><!-- .slides-container -->
            
		</div><!-- #slides -->
		
		<?php endif; ?>

</article><!-- #slides -->