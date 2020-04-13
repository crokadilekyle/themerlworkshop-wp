<?php get_header(); ?>

<div id="primary" class="content-area">

    <!-- <h1><?php single_cat_title( 'Category: ' )?></h1> -->

    <main id="main" class="site-main" role="main">

        <h1><?php the_archive_title(); ?></h1>
        <p><?php echo category_description(); ?></p>
        
        <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('template-parts/content-posts', 'page'); ?>

        <?php endwhile; else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

        <?php echo paginate_links(); ?>

    </main>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>