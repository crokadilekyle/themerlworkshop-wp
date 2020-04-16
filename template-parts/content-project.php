<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">


    <figure>

        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID));?>" alt="post thumbnail" /></a>
        <?php the_title( '<figcaption><a href="'. get_the_permalink() .'">', '</a></figcaption>'); ?>

    </figure>

</header>

<div class="entry-content">

    <?php the_excerpt(); ?>

    <p>
        <?php 
            if ( get_the_terms( $post->ID, 'woodworking')) {

                the_terms( $post->ID, 'woodworking');

            } elseif ( get_the_terms( $post->ID, 'home_improvement' )) {

                the_terms( $post->ID, 'home_improvement'); 

            }
        ?>
    </p>

</div>

</article>