<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">

    <?php 
        if( is_front_page() ){

            get_template_part('template-parts/content', 'hero');

        } else {

            the_title('<h1>', '<h1>');

        }
    ?>


</header>

<div class="entry-content">

    <?php 

        if( is_front_page() ) {

            get_template_part('template-parts/content', 'latest');
            
        } else {

            the_content(); 

        }
    
    ?>

</div>

</article>