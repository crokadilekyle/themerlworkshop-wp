<?php get_header(); ?>

<div id="primary" class="content-area extended">

    <main id="main" class="site-main" role="main">

        <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('template-parts/content', get_post_format() ); ?>

            <p><img src="<?php echo esc_url($post->guid); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></p>

            <!-- <pre><?php var_export($post); ?></pre> -->

        <?php endwhile; else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

    </main>

</div>

<?php get_footer(); ?>