<aside class="col-4-12">

<div class="sidebar_node">

<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>3,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
    
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
           
    <?php
        $image = get_field('image');
        $size = 'thumbnail';
    ?>

    <?php if( $image ): ?>
        <?php echo wp_get_attachment_image( $image, $size ); ?>
    <?php endif; ?>
    
    <h5><?php the_title(); ?></h5>
</a>

<?php
endwhile;
}
wp_reset_query();
}
?>

</div>

</aside>