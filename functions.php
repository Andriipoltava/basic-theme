<?php

/**
 * basic_name  Theme functions and definitions
 *
 * @package basic_name
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
// basic_name includes directory.
$basic_name_inc_dir = 'inc';

// Array of files to include.
$basic_name_includes = array(
    '/setup.php',                           // Theme setup and custom theme supports.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/pagination.php',                      // Custom pagination for this theme.
    '/customizer.php',                      // Customizer additions.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
    '/editor.php',                          // Load Editor functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
    $basic_name_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
    $basic_name_includes[] = '/jetpack.php';
}

// Load Advanced Custom Fields functions if Advanced Custom Fields is activated.
if (class_exists('ACF')) {
    $basic_name_includes[] = '/acf.php';
    $basic_name_includes[] = '/acf-blocks.php';
}


// Include files.
foreach ($basic_name_includes as $file) {
    require_once get_theme_file_path($basic_name_inc_dir . $file);
}