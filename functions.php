<?php

// Add Theme Support
add_theme_support( 'title-tag');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array(
    'aside',
    'gallery',
    'link',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat'
));
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
$logo_defaults = array(
    'height'    => 100,
    'width'     => 400,
    'flex-height'   => true,
    'flex-width'    => true,
    'header-text'   => array( 'site-title', 'site-description')
);

add_theme_support( 'custom-logo', $logo_defaults );
add_theme_support( 'custom-selective-refresh-widgets' );
add_theme_support( 'starter-content' );

// Load in our CSS
function themerlworkshop_enqueue_styles() {

    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', array(), time(), 'all' );

}

add_action( 'wp_enqueue_scripts', 'themerlworkshop_enqueue_styles');


// Register Menu Locations
register_nav_menus(
    array(
        'main-menu' => esc_html__( 'Main Menu', 'themerlworkshop'),
        'footer-menu' => esc_html__('Footer Menu', 'themerlworkshop' )
    ));

// Setup Widget Areas (sidebars)
function themerlworkshop_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__( 'Main Sidebar', 'themerlworkshop' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets for main sidebar here', 'themerlworkshop'),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__( 'Footer Sidebar', 'themerlworkshop' ),
        'id'            => 'footer-sidebar',
        'description'   => esc_html__( 'Add widgets for footer sidebar here', 'themerlworkshop' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => esc_html__( 'Page Sidebar', 'themerlworkshop' ),
        'id'            => 'page-sidebar',
        'description'   => esc_html__( 'Add widgets for page sidebar here', 'themerlworkshop' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));   

    register_sidebar(array(
        'name'          => esc_html__( 'Front Page Widgets', 'themerlworkshop' ),
        'id'            => 'front-page',
        'description'   => esc_html__( 'Add widgets for front page sidebar here', 'themerlworkshop' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));   
}

add_action( 'widgets_init', 'themerlworkshop_widgets_init');
?>