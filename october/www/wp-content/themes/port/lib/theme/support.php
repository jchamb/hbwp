<?php

/**
 *  Set Up theme support and functionality
 */


function port_theme_setup()
{
     // Add our own editor style
    add_editor_style();

    // Theme Images
    add_theme_support( 'post-thumbnails' );
    //add_image_size( 'page-header', 1600, 396, true ); // true hard crops, false proportional

    // HTML5 Support
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'port_theme_setup' );


/**
 *  Register functionality, initilize plugin functionality
 */

function port_theme_init()
{
    // Register Menu
    register_nav_menus(array(
        'main_menu' => 'Navigation items in the main menu.'
    ));
}
add_action( 'init', 'port_theme_init' );



/**
 * Add "Styles" drop-down
 */

function port_mce_editor_buttons( $buttons )
{
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'port_mce_editor_buttons' );



/**
 * Add styles/classes to the "Styles" drop-down
 */

function port_mce_before_init( $settings )
{
    $style_formats = array(
        array(
            'title' => 'Block List',
            'selector' => 'ul',
            'classes' => 'two-column'
        )
        ,array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button'
        )
        ,array(
            'title' => 'Push',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push'
        )
        ,array(
            'title' => 'Push Top',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--top'
        )
        ,array(
            'title' => 'Push Right',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--right'
        )
        ,array(
            'title' => 'Push Bottom',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--bottom'
        )
        ,array(
            'title' => 'Push Left',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--left'
        )
        ,array(
            'title' => 'Push Ends',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--ends'
        )
        ,array(
            'title' => 'Push Sides',
            'selector' => 'p,ul,ol,a',
            'classes' => '.push--sides'
        )
        ,array(
            'title' => 'Flush',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush'
        )
        ,array(
            'title' => 'Flush Top',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--top'
        )
        ,array(
            'title' => 'Flush Right',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--right'
        )
        ,array(
            'title' => 'Flush Bottom',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--bottom'
        )
        ,array(
            'title' => 'Flush Left',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--left'
        )
        ,array(
            'title' => 'Flush Ends',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--ends'
        )
        ,array(
            'title' => 'Flush Sides',
            'selector' => 'p,ul,ol,a',
            'classes' => '.flush--sides'
        )
        ,array(
            'title' => 'Button',
            'selector' => 'a,input,button',
            'classes' => '.button'
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'port_mce_before_init' );



