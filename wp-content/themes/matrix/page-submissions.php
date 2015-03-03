<?php

/* Template Name: Submissions Page */

get_header(); ?>
    
<article class="padded">
     
    <?php if ( have_posts() ) : ?><!-- primary loop -->

        <?php while ( have_posts() ) : the_post(); ?>
          
        <section class="col-6-12">
           
            <?php the_field('introduction'); ?>
            
        </section>         
                    
          
        <section class="col-6-12 highlight">
            
            <?php the_field('criteria'); ?>
            
        </section>
        
    <?php if( have_rows('fee_schedule') ): ?><!-- repeater loop -->

        <aside class="col-12-12 fee_schedule">
        
            <ul>

    <?php while ( have_rows('fee_schedule') ) : the_row(); ?>
           
            <li>
                <div class="group sidebar_node">
                    <img src="<?php the_sub_field('icon'); ?>"/>
                    <h3 class="fee-amount">$<?php the_sub_field('amount'); ?></h3>
                    <h5 class="title"><?php the_sub_field('title'); ?></h5>
                    <p><?php the_sub_field('notes'); ?></p>
                </div>
            </li>
           
    <?php endwhile; ?>
        
            </ul>

        </aside>

    <?php endif; ?><!-- /repeater loop -->        
            
        <?php endwhile; ?>

    <?php else : ?>

        <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?><!-- /primary loop -->
		

</article>

<?php get_footer(); ?>