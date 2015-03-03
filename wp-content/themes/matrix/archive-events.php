<?php

/* Template Name: Events Page */

get_header(); ?>
    
<?php
 
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'events',
        'meta_key' => 'time',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'day',
                'value' => 'Fri',
                'compare' => 'IN'
            )
        )
    );

    $query = new WP_Query( $args );

?>
    
<article class="padded">

    <?php if ( $query->have_posts() ) : ?>

    <header><h3 class="flag">Friday</h3></header>

        <ol class="calendar">

        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php $image = get_field('event_photo'); ?>
            <?php if( !empty($image) ): 

                // vars
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // thumbnail
                $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ]; ?>

            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="event">
                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        <header>

                            <div class="meta">

                                <?php $posts = get_field('venue'); if( $posts ): ?><?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?><span><?php echo get_the_title( $p->ID ); ?></span><?php endforeach; ?><?php endif; ?>

                                <time> @ <?php the_field( 'time' ); ?>pm</time>

                            </div>

                            <div class="event-title friday">
                                <h5><?php the_title(); ?></h5>
                            </div>

                        </header>

                    </div>
                </a>
            </li>

            <?php endif; ?>

        <?php endwhile; ?>

        </ol>

    <?php endif; ?>

    <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

</article>

<?php
 
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'events',
        'meta_key' => 'time',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'day',
                'value' => 'Sat',
                'compare' => 'IN'
            )
        )
    );

    $query = new WP_Query( $args );

?>
    
<article class="padded">

    <?php if ( $query->have_posts() ) : ?>

    <header><h3 class="flag">Saturday</h3></header>

        <ol class="calendar">

        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php $image = get_field('event_photo'); ?>
            <?php if( !empty($image) ): 

                // vars
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // thumbnail
                $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ]; ?>

            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="event">
                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        <header>

                            <div class="meta">

                                <?php $posts = get_field('venue'); if( $posts ): ?><?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?><span><?php echo get_the_title( $p->ID ); ?></span><?php endforeach; ?><?php endif; ?>

                                <time> @ <?php the_field( 'time' ); ?>pm</time>

                            </div>

                            <div class="event-title saturday">
                                <h5><?php the_title(); ?></h5>
                            </div>

                        </header>

                    </div>
                </a>
            </li>

            <?php endif; ?>

        <?php endwhile; ?>

        </ol>

    <?php endif; ?>

    <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

</article>

<?php get_footer(); ?>