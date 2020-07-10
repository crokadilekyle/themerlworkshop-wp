<?php
    $pageCF = get_post_custom(get_the_ID());
?>

<meta name="description" content="<?php 
        if (isset($pageCF['description'])) {
                esc_html_e($pageCF['description'][0], 'themerlworkshop');
            } else {
                esc_html_e(get_the_excerpt(get_the_ID()), 'themerlworkshop');
            }
    ?>">
<meta name="keywords" content="<?php esc_html_e( $pageCF['tags'][0], 'themerlworkshop' ) ?>">