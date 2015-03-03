<!-- #UPDATES -->
<article id="news" class="padded updates">
    
    <header><h3 class="flag">News & Updates</h3></header>

	<section class="col-6-12 recent">
        
        <?php query_posts('showposts=2'); ?>

		<?php if ( have_posts() ) : ?>
            
			<?php while ( have_posts() ) : the_post(); ?>
                
                <a href="<?php the_permalink(); ?>">
                    <?php the_title( '<h4>', '</h4>' ); ?>
                </a>

                <time><?php the_time('F j, Y'); ?> @ <?php the_time('g:i a'); ?></time>

                <?php the_excerpt(); ?>

			<?php endwhile; ?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section>
	
	<section class="col-6-12 older">
        
        <?php query_posts('posts_per_page=2&offset=2'); ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <a href="<?php the_permalink(); ?>">
                    <?php the_title( '<h4>', '</h4>' ); ?>
                </a>

                <time><?php the_time('F j, Y'); ?> @ <?php the_time('g:i a'); ?></time>

                <?php the_excerpt(); ?>

			<?php endwhile; ?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section>
	
</article>
<!-- /#UPDATES -->