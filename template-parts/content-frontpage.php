<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- <header class="entry-header">

    <?php the_title( '<h1>', '<h1>' ); ?>

</header> -->

<div class="entry-content">

    <?php 

            get_template_part('template-parts/content', 'latest');

            get_template_part('template-parts/content', 'about');
               
    ?>

</div>

</article>