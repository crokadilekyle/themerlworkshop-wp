<section id="recent-projects">
    <h2 style="text-align: center;">Recent Projects</h2>

    <section class="recent-posts-grid">

    <?php

    $recent_projects = wp_get_recent_posts( array('post_type'=>'project'));
    $recent_posts = wp_get_recent_posts();

    $all_posts = array_merge($recent_projects, $recent_posts);
    
        foreach ($all_posts as $post) { ?>

        <article id="post-<?php the_ID($post['ID']); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <figure>

                    <a href="<?php the_permalink($post['ID']); ?>">
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post['ID']));?>" alt="post thumbnail" />
                    </a>
                    
                    <figcaption>
                        <a href="<?php get_the_permalink($post['ID']);?>">
                            <?php echo get_the_title($post['ID']);?>
                        </a>
                    </figcaption>

                </figure>

            </header>

            <div class="entry-content">

                <?php echo get_the_excerpt($post['ID']); ?>

            </div>

        </article>

        <?php } ?>

    </section>

</section>