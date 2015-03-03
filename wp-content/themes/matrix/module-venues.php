

<h2>Venues</h2>

<?php $address = get_field('address'); ?>

<ul>



    
<?php $image = get_field('venue_photo'); ?>
<?php if( $image ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'medium';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ]; ?>
	
	<?php foreach( $image as $image ): ?>

<li>
	<img src="<?php echo $size; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />


   </li>
   
<?php endforeach; ?>

<?php endif; ?>


<?php if( $address ): ?>

<?php foreach( $address as $address ): ?>

<li><?php echo $address; ?></li>

<?php endforeach; ?>

<?php endif; ?>

</ul>

