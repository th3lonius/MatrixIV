<aside class="col-4-12">

	<?php if( have_rows('contacts') ): ?>

	<section>

		<ul class="sidebar_node">

		<?php while ( have_rows('contacts') ) : the_row(); ?>

			<li>
				<h5><?php the_sub_field( 'title' ); ?></h5>
				<address><?php the_sub_field( 'address' ); ?></address>
			</li>

		<?php endwhile; ?>

		</ul>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</section>

</aside>