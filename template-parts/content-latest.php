<section id="recent-projects" class="front-page-section">
    <h2><?php esc_html_e( 'Latest from the Merl Workshop' ); ?></h2>

    <section class="recent-posts-grid">

    <?php
    $recent_projects = wp_get_recent_posts( array('post_type'=>'project'));
    $recent_posts = wp_get_recent_posts();
    $merged_posts = array_merge($recent_projects, $recent_posts);
    $all_posts = wp_list_sort($merged_posts, 'post_date', 'desc');
    
        foreach ($all_posts as $post) { ?>

        <article id="post-<?php echo $post['ID']; ?>" class="thumbnail">

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

                <p><?php echo get_the_excerpt($post['ID']); ?></p>

            </div>

        </article>

        <?php } ?>

    </section>

</section>