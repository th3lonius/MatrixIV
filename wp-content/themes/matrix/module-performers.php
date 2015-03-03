<?php 

$posts = get_field('performers');

if( $posts ): ?>
        
    <ul class="lineup">
    
    <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
      
        <?php

        $image = get_field('image',$p->ID);

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
            <a href="<?php echo get_permalink( $p->ID ); ?>">
                <article class="performer">
                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                    <header>
                        <div class="content">
                            <div class="meta"><?php the_field('location',$p->ID); ?></div>
                            <h3><?php echo get_the_title( $p->ID ); ?></h3>
                        </div>
                    </header>
                </article>
            </a>
        </li>

				
    <?php endforeach; ?>
    
    </ul>
    
<?php endif; ?>