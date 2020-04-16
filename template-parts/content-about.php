<section id="frontpage-about" class="front-page-section">
    <h2><?php esc_html_e( 'What is the Merl Workshop' ); ?></h2>

    <section class="full-width">

        <?php 
            $post = get_post(12);
            $about = get_the_excerpt($post);
        ?>

        <article id="post-<?php the_ID(12); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <?php echo get_the_post_thumbnail($post, 'large'); ?>

            </header>

            <div class="entry-content">

                <p><?php echo $about; ?></p>

                <div class="cta">

                    <a href="<?php echo get_the_permalink($post); ?>">

                        <span class="btn-primary"><?php esc_html_e( 'Read More About Me' ); ?></span>

                    </a>

                </div>

            </div>

        </article>

    </section>

</section>