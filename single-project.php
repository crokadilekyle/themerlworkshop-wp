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

                <?php wp_link_pages(); ?>

            </div>

            <footer>

                <p>
                    Categories: <?php if (get_the_terms($post->ID, 'woodworking')) {
                                    the_terms( $post->ID, 'woodworking'); 
                                } elseif (get_the_terms($post->ID, 'home_improvement')) {
                                    the_terms( $post->ID, 'home_improvement');
                                }
                                ?>
                </p>

                <p>
                    <a href="<?php the_field( 'url' ); ?>">
                        <?php esc_html_e( ' Check out the video ', 'themerlworkshop'); ?>
                    </a>
                </p>

            </footer>

        </article>

        <?php endwhile;  ?>

            <nav>
                <ul class="pager">
                    <li><?php previous_post_link( '%link', 'Previous Project' ); ?></li>
                    <li><?php next_post_link( '%link', 'Next Project' ); ?></li>
                </ul>
            </nav>
        
        <?php endif; ?>

    </main>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>