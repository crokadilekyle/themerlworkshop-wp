<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">

    <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID); ?>"></span>

    <?php the_title( '<h2><a href="' . esc_url(get_permalink() ) . '">', '</a></h2>'); ?>

</header>

<div class="byline">
    <?php esc_html_e( 'Author:' ); ?> <?php the_author_posts_link(); ?>
</div>

<div class="entry-content">

    <?php the_excerpt(); ?>

</div>

</article>