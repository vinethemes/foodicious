<?php

function foodicious_customizer_config() {

    $args = array(

        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
        // The developer recommends an image size of about 250 x 250

        // The color of active menu items, help bullets etc.
        'color_active' => '#444',

        // Color used for secondary elements and disable/inactive controls
        'color_light'  => '#eee',

        // Color used for button-set controls and other elements
        'color_select' => '#34495e',

        // You can add your own custom stylesheet for full control as well
        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles',

    );

    return $args;

}
add_filter( 'kirki/config', 'foodicious_customizer_config' );


Kirki::add_config( 'foodicious', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

Kirki::add_panel( 'typography', array(
    'priority'    => 10,
    'title'       => __( 'Typography', 'foodicious' ),
    'description' => __( 'This panel will provide all the webfonts for your website.', 'foodicious' ),
) );






Kirki::add_section( 'title_section', array(
    'title'          => __( 'Website Fonts, Colors, Style' , 'foodicious'),
    'description'    => __( 'You can change Website webfonts, colors, typography from here.', 'foodicious' ),
    'panel'          => 'typography', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( 'my_custom_text', array(
    'settings' => 'my_custom_text',
    'section'  => 'title_section',
    'type'     => 'custom',
    'default'  => __( 'This is only available in Premium Version. <br/><a target="_blank" href="https://www.vinethemes.com/downloads/foodicious-food-blog-wordpress-theme/"> + Upgrade to Premium Version</a>', 'foodicious' ),
) );




