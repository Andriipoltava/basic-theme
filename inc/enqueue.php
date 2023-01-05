<?php
/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

    // Get the theme data.
    $the_theme = wp_get_theme();
    $suffix = '.min';
    $ver = $the_theme->get('Version');
    if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
        $suffix = '';
        $ver = time();
    }
    // Grab asset urls.
    $theme_styles = "/assets/css/theme{$suffix}.css";
    $theme_scripts = "/assets/js/theme{$suffix}.js";


    wp_enqueue_style('basic_name-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $ver);
    wp_enqueue_script('jquery');
    wp_enqueue_script('basic_name-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $ver, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
