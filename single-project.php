<?php get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <?php the_title( '<h1>', '</h1>'); ?>

                <?php the_post_thumbnail( 'full' );?>

            </header>

            <div class="entry-content">

                <?php the_content(); ?>

            </div>

            <footer>

                <p>
                    Categories: <?php the_terms( $post->ID, 'woodworking'); ?>
                </p>

                <p>
                    <a href="<?php the_field( 'url' ); ?>">
                        <?php esc_html_e( ' Check out the video ', 'themerlworkshop'); ?>
                    </a>
                </p>

            </footer>

        </article>

        <?php endwhile;  endif; ?>

    </main>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>