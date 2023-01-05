<?php

/**
 * basic_name modify editor
 *
 * @package basic_name
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('admin_init', 'basic_name_wpdocs_theme_add_editor_styles');

if (!function_exists('basic_name_wpdocs_theme_add_editor_styles')) {
    /**
     * Registers an editor stylesheet for the theme.
     */
    function basic_name_wpdocs_theme_add_editor_styles()
    {
        add_editor_style('/assets/css/theme.css');
    }
}

add_filter('mce_buttons_2', 'basic_name_tiny_mce_style_formats');

if (!function_exists('basic_name_tiny_mce_style_formats')) {
    /**
     * Reveals TinyMCE's hidden Style dropdown.
     *
     * @param array $buttons Array of Tiny MCE's button ids.
     * @return array
     */
    function basic_name_tiny_mce_style_formats($buttons)
    {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
}

add_filter('tiny_mce_before_init', 'basic_name_tiny_mce_before_init');

if (!function_exists('ubasic_name_tiny_mce_before_init')) {
    /**
     * Adds style options to TinyMCE's Style dropdown.
     *
     * @param array $settings TinyMCE settings array.
     * @return array
     */
    function basic_name_tiny_mce_before_init($settings)
    {

        $style_formats = array(
            array(
                'title' => __('Lead Paragraph', 'basic_name'),
                'selector' => 'p',
                'classes' => 'lead',
                'wrapper' => true,
            ),
            array(
                'title' => _x('Small', 'Font size name', 'basic_name'),
                'inline' => 'small',
            ),
            array(
                'title' => __('Blockquote', 'basic_name'),
                'block' => 'blockquote',
                'classes' => 'blockquote',
                'wrapper' => true,
            ),
            array(
                'title' => __('Blockquote Footer', 'basic_name'),
                'block' => 'footer',
                'classes' => 'blockquote-footer',
                'wrapper' => true,
            ),
            array(
                'title' => __('Cite', 'basic_name'),
                'inline' => 'cite',
            ),
        );

        if (isset($settings['style_formats'])) {
            $orig_style_formats = json_decode($settings['style_formats'], true);
            if (is_array($orig_style_formats)) {
                $style_formats = array_merge($orig_style_formats, $style_formats);
            }
        }

        $settings['style_formats'] = wp_json_encode($style_formats);
        return $settings;
    }
}

add_filter('mce_buttons', 'basic_name_tiny_mce_blockquote_button');

if (!function_exists('basic_name_tiny_mce_blockquote_button')) {
    /**
     * Removes the blockquote button from the TinyMCE toolbar.
     *
     * We provide the blockquote via the style formats. Using the style formats
     * blockquote receives the proper Bootstrap classes.
     *
     * @param array $buttons TinyMCE buttons array.
     * @return array TinyMCE buttons array without the blockquote button.
     * @since 1.0.0
     *
     */
    function basic_name_tiny_mce_blockquote_button($buttons)
    {
        foreach ($buttons as $key => $button) {
            if ('blockquote' === $button) {
                unset($buttons[$key]);
            }
        }
        return $buttons;
    }
}