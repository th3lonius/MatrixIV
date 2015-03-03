<section class="event-meta">
    
    <a href="<?php echo the_field('ticket_link') ?>" class="ticket-link">$<?php echo the_field( 'price' ); ?></a>
    
    <span class="separator"></span>
   
    <?php 

    $posts = get_field('venue');

    if( $posts ): ?>
        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                <a class="venue" href="<?php echo site_url(); ?>/festinfo#venues"><?php echo get_the_title( $p->ID ); ?></a>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <span class="separator"></span>
    
    <time><?php the_field( 'time' ); ?>pm</time>

</section>