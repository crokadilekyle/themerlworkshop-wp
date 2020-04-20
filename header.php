<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

    <div id="page">

        <a href="#content" class="skip-link screen-reader-text">
            <?php esc_html_e( 'Skip to Content', 'themerlworkshop'); ?>
        </a>

        <header id="masthead" class="site-header" role="banner">

            <div class="site-branding">
                    <?php if (display_header_text() == true): ; ?>
                <p>
                    <a href="<?php echo esc_url( home_url('/')); ?>" rel="home">
                        <h1><?php bloginfo( 'name' ); ?></h1>
                    </a>
                    
                </p>
                <p class="site-description">
                    <?php bloginfo( 'description' ); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php get_template_part('template-parts/content', 'hero'); ?>

            <nav id="site-navigation" class="main-navigation" role="navigation">

                <?php
                    $args = array(
                        'theme_location' => 'main-menu'
                    );
                    wp_nav_menu($args); 
                ?>
                
                <!-- <li><?php wp_loginout( get_permalink() ); ?></li> -->
            
            </nav>
        </header>

        <div id="content" class="site-content">

            
