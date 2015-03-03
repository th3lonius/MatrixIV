<?php $day = get_field('day', $event->ID); ?>

<aside>

    <section class="showdate <?php if ($day == "Fri") { echo 'friday'; } elseif ($day == "Sat") { echo 'saturday'; } else { echo 'sunday'; } ?>">
        <div class="grouper">
            <h3 class="day"><?php the_field( 'day' ); ?></h3>
            <date><?php the_field( 'date' ); ?></date>
        </div>
    </section>
    
</aside>