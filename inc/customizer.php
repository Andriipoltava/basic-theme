<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'basic_name_customize_register' ) ) {
    /**
     * Register basic support (site title, header text color) for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Customizer reference.
     */
    function basic_name_customize_register( $wp_customize ) {
        $settings = array( 'blogname', 'header_textcolor' );
        foreach ( $settings as $setting ) {
            $get_setting = $wp_customize->get_setting( $setting );
            if ( $get_setting instanceof WP_Customize_Setting ) {
                $get_setting->transport = 'postMessage';
            }
        }

        // Override default partial for custom logo.
        $wp_customize->selective_refresh->add_partial(
            'custom_logo',
            array(
                'settings'            => array( 'custom_logo' ),
                'selector'            => '.custom-logo-link',
                'render_callback'     => 'basic_name_customize_partial_custom_logo',
                'container_inclusive' => false,
            )
        );
    }
}
add_action( 'customize_register', 'basic_name_customize_register' );

if ( ! function_exists( 'basic_name_customize_partial_custom_logo' ) ) {
    /**
     * Callback for rendering the custom logo, used in the custom_logo partial.
     *
     * @return string The custom logo markup or the site title.
     */
    function basic_name_customize_partial_custom_logo() {
        if ( has_custom_logo() ) {
            return get_custom_logo();
        } else {
            return get_bloginfo( 'name' );
        }
    }
}





