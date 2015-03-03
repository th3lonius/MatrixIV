<?php

/* Template Name: Festinfo Page */

get_header(); ?>
    
<header>
	<nav class="subnav">
		<ul>
			<li><a href="#tickets">Tickets &amp; Passes</a></li>
			<li><a href="#venues">Venues</a></li>
			<li><a href="#faq">F.A.Q.</a></li>
			<li><a href="#staff">Staff</a></li>
			<li><a href="#press">Press</a></li>
		</ul>
	</nav>
</header>

<!------- ABSTRACT ------->

<?php
 
    $args = array(
        'post_type' => 'festinfo'
    );

    $info_query = new WP_Query( $args );

?>

<article class="padded">

    <section class="col-8-12 content">

    <?php if ( $info_query->have_posts() ) : ?>

        <?php while ( $info_query->have_posts() ) : $info_query->the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>

    </section>

    <?php else : ?>

        <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

<?php get_template_part( 'aside', 'festinfo' ); ?>

</article>

<!------- TICKETS ------->

<?php get_template_part( 'module', 'tickets' ); ?>

<!------- VENUES ------->
  
   
<?php

    $args = array(
        'post_type' => 'venues',
        'posts_per_page' => 4
    );

    $venues_query = new WP_Query( $args );

?>

<article id="venues" class="padded">
    
    <header><h3 class="flag">Venues</h3></header>
    
    <section class="col-6-12">
            
        <ul>

            <?php while ( $venues_query->have_posts() ) : $venues_query->the_post(); ?>

            <?php
                $image = get_field('venue_photo');
                $size = 'full';
            ?>

            <?php if( $image ): ?>
                    <li>
                        <h4><?php the_title(); ?></h4>
                        <address><?php the_field('address'); ?></address>
                        <?php echo wp_get_attachment_image( $image, $size ); ?>
                        <?php the_content(); ?>
                    </li>

            <?php endif; ?>

            <?php endwhile; // end of the loop. ?>

        </ul>

    </section>
    
<?php

    $args = array(
        'post_type' => 'venues',
        'offset' => 4
    );

    $venues_query = new WP_Query( $args );

?>
    
    <section class="col-6-12">
            
        <ul>

            <?php while ( $venues_query->have_posts() ) : $venues_query->the_post(); ?>

            <?php
                $image = get_field('venue_photo');
                $size = 'full';
            ?>

            <?php if( $image ): ?>
                    <li>
                        <h4><?php the_title(); ?></h4>
                        <address><?php the_field('address'); ?></address>
                        <?php echo wp_get_attachment_image( $image, $size ); ?>
                        <?php the_content(); ?>
                    </li>

            <?php endif; ?>

            <?php endwhile; // end of the loop. ?>

        </ul>

    </section>
    
</article>

    <a href="<?php bloginfo('template_directory'); ?>/img/venue-map.jpg" style="clear:both;"><img src="<?php bloginfo('template_directory'); ?>/img/venue-map.jpg" width="400px"/></a>

<!------- STAFF ------->

<?php

    $args = array(
        'post_type' => 'staff',
        'orderby' => 'date',
        'order'   => 'ASC',
    );

    $staff_query = new WP_Query( $args );

?>

<article id="staff" class="padded">

    <header><h3 class="flag">Staff</h3></header>
    
    <ul class="lineup">
    
    <?php while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>
                   
        <?php $image = get_field('photo'); ?>
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
       
				<li>
					<a href="<?php the_permalink(); ?>">
					    <article class="performer">
						    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                            <header>
                                <div class="content">
                                    <div class="meta"><?php the_field('position') ?></div>
                                    <h5><?php the_title() ?></h5>
                                </div>
                            </header>
                        </article>
					</a>
				</li>

        <?php endif; ?>
    
    <?php endwhile; // end of the loop. ?>
    
    </ul>
    
<?php wp_reset_query(); ?>

</article>

<!------- PRESS ------->

<article id="press" class="padded">
   
    <header><h3 class="flag">Press</h3></header>

<?php while ( $info_query->have_posts() ) : $info_query->the_post(); ?>
    
    <?php if( have_rows('press') ): ?>

    <ul>

        <?php while ( have_rows('press') ) : the_row(); ?>

        <li>
            <a href="<?php the_sub_field( 'permalink' ); ?>"><h5 class="title"><?php the_sub_field( 'title' ); ?></h5></a>
            <h6 class="agent"><?php the_sub_field( 'agent' ); ?></h6>
            <blockquote>"<?php the_sub_field( 'excerpt' ); ?>"</blockquote>
        </li>

        <?php endwhile; ?>

    </ul>

    <?php endif; ?>

<?php endwhile; ?>

</article>

<?php get_footer(); ?>