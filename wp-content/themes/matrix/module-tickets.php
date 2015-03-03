<?php
 
    $args = array(
        'post_type' => 'festinfo',
        'name' => 'tickets'
    );

    $info_query = new WP_Query( $args );

?>     

<?php if ( $info_query->have_posts() ) : ?>
       
        <article id="tickets" class="contrast">

            <header><h3 class="flag">Tickets & Passes</h3></header>
            
    <?php while ( $info_query->have_posts() ) : $info_query->the_post(); ?>
            
            <section class="col-10-12 no-float">

            <?php if( have_rows('passes') ): ?>

                <ul class="tickets">

            <?php while ( have_rows('passes') ) : the_row(); ?>

                    <li class="node">

                        <a href="<?php the_sub_field('external_link'); ?>">
                            <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('pass_name'); ?>" />
                            <h4><?php the_sub_field('pass_name'); ?></h4>
                            <span>$<?php the_sub_field('price'); ?></span>
                            <p><?php the_sub_field('description'); ?></p>
                        </a>

                    </li>

            <?php endwhile; ?>

                </ul>

            <?php endif; ?>

            </section>
            
            <?php if( is_front_page() ) {    
            
            } else { ?>
            
            <section class="col-8-12 padded-x no-float">
               
                <?php the_field('ticket_info'); ?>
            
            </section>
            
            <?php } ?>
            
    <?php endwhile; ?>

        </article>
	
<?php endif; ?>