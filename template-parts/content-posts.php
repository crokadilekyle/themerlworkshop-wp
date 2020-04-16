<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">

    <!-- <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID); ?>"></span> -->

    <figure>

        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID));?>" alt="post thumbnail" /></a>
        <?php the_title( '<figcaption><a href="'. esc_url(get_the_permalink()) .'">', '</a></figcaption>'); ?>

    </figure>

</header>

<!-- <div class="byline">
    <?php esc_html_e( 'Author:' ); ?> <?php the_author_posts_link(); ?>
</div> -->

<div class="entry-content">

    <?php the_excerpt(); ?>

</div>

</article>