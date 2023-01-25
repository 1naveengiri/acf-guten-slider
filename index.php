<?php
/**
 * Plugin Name: ACF Guten Slider
 * Description: ACF Guten Slider block
 * Version: 0.1
 * Author: 1naveengiri 
 */

define( 'ACF_SLIDER_PATH', plugin_dir_path( __FILE__ ) . 'template-parts/blocks/' );

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'guten-slider',
            'title'             => __('Guten Slider'),
            'description'       => __('A custom Guten Slider block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Guten Slider', 'quote' ),
        ));
    }
}

function my_acf_block_render_callback( $block ) {
    
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "template-parts/block" folder
    if( file_exists(  ACF_SLIDER_PATH."{$slug}.php"  ) ) {
        include(  ACF_SLIDER_PATH."{$slug}.php" );
    }
}