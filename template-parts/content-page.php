<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">

    <?php if ( !is_front_page() ) {

        the_title('<h1>', '<h1>');

        the_post_thumbnail( 'large', array('class' => 'featured-image') );
        
     } ?>

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