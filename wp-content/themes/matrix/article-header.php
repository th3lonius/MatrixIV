<header class="page-title">

	<?php
		if ( is_singular('lineup') ) {

            echo the_title('<h2 class="flag lineup lineup-single">','</h2>');if(get_field('location')!='') { ?><h3 class="artist-location"><?php echo the_field('location'); ?></h3><?php }
                                          
		} elseif ( get_post_type() == 'lineup' ) {

			?> <h2 class="flag lineup">2015 Performers</h2> <?php

		} elseif ( is_singular() == 'events' ) {

            ?> <h2 class="flag events"><?php echo the_title(); ?></h2> <?php

		} elseif ( is_archive() && get_post_type() == 'events' ) {

            ?> <h2 class="flag events"><?php echo $post->post_type; ?> Calendar</h2> <?php

		} elseif ( get_post_type() == 'festinfo' || 'staff' ) {

			?> <h2 class="flag festinfo"><?php echo $post->post_type; ?></h2> <?php

		} elseif ( is_page( 'submissions' )  ) {

            ?> <h2 class="flag submissions"><?php echo the_title(); ?></h2> <?php

		} elseif ( is_front_page() ) {
            
            ?> <h2 class="flag front-page">2015</h2> <?php
            
        } elseif (is_singular('post')) {
            
            ?> <h2>News</h2> <?php
            
        } else {

			?> <h2 class="flag"><?php echo $post->post_type; ?></h2> <?php

		}
	?>

</header>