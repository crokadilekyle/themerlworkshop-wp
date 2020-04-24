<?php get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('template-parts/content', get_post_format() ); ?>

        <?php endwhile; ?>

            <nav>
                <ul class="pager">
                    <li><?php previous_post_link( '%link', 'Previous Post' ); ?></li>
                    <li><?php next_post_link( '%link', 'Next Post' ); ?></li>
                </ul>
            </nav>

        <?php endif; ?>

    </main>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>