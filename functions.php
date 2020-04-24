<?php

// Add Theme Support
add_theme_support( 'title-tag');
add_theme_support( 'post-thumbnails' ,array('post', 'page', 'project') );
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
    'height'    => 250,
    'width'     => 250,
    'flex-height'   => true,
    'flex-width'    => true,
    'header-text'   => array( 'site-title', 'site-description')
);

add_theme_support( 'custom-logo', $logo_defaults );
add_theme_support( 'custom-selective-refresh-widgets' );
add_theme_support( 'starter-content' );

add_post_type_support( 'page', 'excerpt' );

// Load in our CSS
function themerlworkshop_enqueue_styles() {

    wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '', 'all' );
    wp_enqueue_style( 'pt-sans-css', get_stylesheet_directory_uri() . 'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), '', 'all' );
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', array(), time(), 'all' );

}

add_action( 'wp_enqueue_scripts', 'themerlworkshop_enqueue_styles');


//Load in our Javascript
function themerlworkshop_enqueue_scripts() {

    wp_enqueue_script('theme-js', get_stylesheet_directory_uri(). '/assets/js/theme.js', [], time(), true);
    // wp_enqueue_script('theme-js', get_stylesheet_directory_uri(). '/assets/js/jquery-theme.js', ['jquery'], time(), true);

}

add_action('wp_enqueue_scripts', 'themerlworkshop_enqueue_scripts');

// Register Menu Locations
register_nav_menus(
    array(
        'main-menu' => esc_html__( 'Main Menu', 'themerlworkshop'),
        'footer-menu' => esc_html__('Footer Menu', 'themerlworkshop' )
    ));

    
    
    // Add login/logout to nav
    add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
    function add_login_logout_link($items, $args) {
        $menu_name = $args->menu->name;
        if ($menu_name == 'navigation'){
            ob_start();
            // wp_loginout('index.php');
            wp_loginout( get_permalink() );
            $loginoutlink = ob_get_contents();
            ob_end_clean();
            $items .= __('<li>'. ucwords($loginoutlink) .'</li>');
        }
        return $items;
    }
    


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



// Hooking into footer example
function themerlworkshop_before_footer_message() {

    locate_template( 'template-parts/before-footer.php', true );

}

// add_action( 'themerlworkshop_before_footer', 'themerlworkshop_before_footer_message', 10 );
// add_action( 'wp_print_footer_scripts', 'themerlworkshop_before_footer_message', 10 );



// Hooking into save_post example

function themerlworkshop_add_draft_to_titles( $post_id){

    // If post revision do not proceed
    if ( wp_is_post_revision($post_id)) {
        return;
    }

    // Get Post
    $post = get_post( $post_id );

    // Add or remove "DRAFT: " from title depending on status
    if ('draft' === $post->post_status && 'DRAFT: ' !== substr($post->post_title, 0, 7)){

        $post->post_title = 'DRAFT: ' . $post->post_title;
    } elseif ( 'publish' === $post->post_status && 'DRAFT: ' === substr( $post->post_title, 0, 7)){

    // Remove 'DRAFT: ' from title
    $post->post_title = substr( $post->post_title, 7);
    }

    // If slug starts with 'draft-' remove it
    if ( 'draft-' === substr( $post->post_name, 0, 6 )){
        $post->post_name = substr( $post->post_name, 6 );
    }

    // unhook themerlworkshop_add_draft_to_titles so it doesn't loop infinitely
    remove_action('save_post', 'themerlworkshop_add_draft_to_titles');

    // Update the post
    wp_update_post($post);

    // Re-hook themerlworkshop_add_draft_to_titles
    add_action('save_post', 'themerlworkshop_add_draft_to_titles');

}

add_action( 'save_post', 'themerlworkshop_add_draft_to_titles' );


// playing with hooks - hooking into customizer

function themerlworkshop_customizer_test(){
    wp_enqueue_script('customizer-test', get_stylesheet_directory_uri(). '/assets/js/customizer-test.js', [], time(), true);
}

add_action( 'customize_controls_enqueue_scripts', 'themerlworkshop_customizer_test');

// Footer message filter
function themerlworkshop_make_uppercase($message) {
    $new_message = $message . ' - All Rights Reserved.';
    // $new_message = "No copyright for you!";
    return $new_message;
}

add_filter( 'themerlworkshop_footer_message', 'themerlworkshop_make_uppercase', 15 );


// Title filter


function themerlworkshop_capitalize_title($title) {

    if ( is_singular() && in_the_loop()) {

        return strtoupper($title);
    } 

    return $title;
}

add_filter('the_title', 'themerlworkshop_capitalize_title', 10, 2);

// Add ads block in middle of content

// function themerlworkshop_content_ads( $content ) {

//     if (!in_the_loop() ){
//         return;
//     }

//     $paragraphs;

//     $pattern = "/<p>.*?<\/p>/m";
//     $p_count = preg_match_all( $pattern, $content, $paragraphs );
//     $paragraphs = $paragraphs[0];

//     // Find middle Paragraph
//     $ad_p_number = floor( $p_count / 2 );
//     if( 0 == $ad_p_number ) $ad_p_number = 1;
//     $ad_p = $paragraphs[ $ad_p_number -1 ];

//     $post_ad = '<div class="post-ad"><h2>Post Advertisement</h2></div>';
//     $ad_p_w_ad = '<p>' . $ad_p . '</p>' . $post_ad;

//     $content_w_ad = str_replace( $ad_p, $ad_p_w_ad, $content) ;

//     return $content_w_ad;

// }

// add_filter('the_content', 'themerlworkshop_content_ads', 10 );
function themerlworkshop_read_more_link( $read_more_text ){
    global $post;
    $new_read_more = '... <a class=more-link" href="'
                        . get_permalink( $post->ID)
                        . '">'
                        . esc_html__( 'Read More &gt;', 'themerlworkshop')
                        . '</a>';

    return $new_read_more;
}
add_filter( 'excerpt_more', 'themerlworkshop_read_more_link', 15 );


// Filter adding custom-class to body class
function themerlworkshop_add_to_body_class($class){

    if( 'page' === get_post_type() ) {
        $class[] = "custom-class";
    }

    return $class;
}

add_filter( 'body_class', 'themerlworkshop_add_to_body_class', 10 );


//Filter for customizing posts columns
function themerlworkshop_customize_post_columns( $columns ){
    unset( $columns['author']);
    unset( $columns['comments']);
    return $columns;

}
add_filter('manage_posts_columns', 'themerlworkshop_customize_post_columns', 100 );



// //Adding to the customizer
// function themerlworkshop_customize_register( $wp_customize ) {
    
//     $wp_customize->add_section( 'header_textcolor', array(
//         'title'     => __( 'Ninnytons', 'themerlworkshop' ),
//     ));


//     $wp_customize->add_setting( 'header_textcolor', array(
//         'default' => '#000',
//     ));


//     $wp_customize->add_control( 'header_textcolor', array(
//         'label'     => __('Header Color', 'themerlworkshop'),
//         'section'   => 'header_textcolor',
//         'setting'   => 'header_textcolor_setting',
//         'type'      => 'text',
//     ));

//     $wp_customize->add_panel( 'header_textcolor_setting', array(
//         'title'     => __( 'Header Text Color Settings', 'themerlworkshop' ),
//         'priority'  => 10,
//     ));

    
    
// }
// add_action( 'customize_register', 'themerlworkshop_customize_register' );





function themerlworkshop_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'home_call_to_action_setting_section', array(
		'default'           => __( 'WHAT IS RO PURIFIER?', 'themerlworkshop' ),
	) );

	$wp_customize->add_control( 'home_call_to_action_setting_section', array(
		'type'    => 'text',
		'label'   => __( 'CTA Heading', 'themerlworkshop' ),
		'section' => 'home_call_to_action_section',
		'setting' => 'home_call_to_action_setting_section',
	) );

	$wp_customize->add_panel( 'home_page_settings', array(
		'title'    => __( 'Home Page Settings', 'themerlworkshop' ),
		'priority' => 10,
	) );

	$wp_customize->add_section( 'home_call_to_action_section', array(
		'title' => __( 'Call To Action', 'themerlworkshop' ),
		'panel' => 'home_page_settings',
	) );

}

add_action( 'customize_register', 'themerlworkshop_customize_register' );
?>