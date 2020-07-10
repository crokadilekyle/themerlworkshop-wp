<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">

    <?php 

            get_template_part('template-parts/content', 'latest');

            get_template_part('template-parts/content', 'about');
               
    ?>

</div>

</article>