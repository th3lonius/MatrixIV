<?php while ( have_posts() ) : the_post(); ?>    

	<?php 
		$events = get_posts(array(
			'post_type' => 'events',
			'meta_query' => array(
				array(
					'key' => 'performers', // name of custom field
					'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
				)
			)
		));
	?>

	<?php if( $events ): ?>

		<?php foreach( $events as $event ): ?>
			<?php 

			$day = get_field('day', $event->ID);
			$date = get_field('date', $event->ID);
			$time = get_field('time', $event->ID);

			?>

				<a href="<?php echo get_permalink( $event->ID ); ?>" class="sidebar_node">
					<section class="showdate <?php if ($day == "Fri") { echo 'friday'; } elseif ($day == "Sat") { echo 'saturday'; } else { echo 'sunday'; } ?>">
					    <div class="grouper">
                            <h3 class="day"><?php echo $day; ?></h3>
                            <date><?php echo $date; ?></date>
                        </div>
					</section>
					<h4 class="event-title"><?php echo get_the_title( $event->ID ); ?></h4>
				</a>
				
		<?php endforeach; ?>
       
	<?php endif; ?>

<?php endwhile; // end of the loop. ?>

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>