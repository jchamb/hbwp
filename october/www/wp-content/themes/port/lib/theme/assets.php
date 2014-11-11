<?php

add_action( 'wp_enqueue_scripts', 'port_register_assets');

function port_register_assets()
{
    wp_enqueue_style(
        'normalize'
        , get_template_directory_uri().'/assets/css/normalize.css'
    );

    wp_enqueue_style(
        'port.main'
        ,get_template_directory_uri().'/assets/css/main.css'
        ,array('normalize')
    );

    wp_enqueue_script(
        'modernizr'
        ,get_template_directory_uri().'/assets/js/vendor/modernizr.js'
        ,false
        ,false
        ,false // in head
    );

    wp_enqueue_script(
        'port.plugins'
        ,get_template_directory_uri().'/assets/js/plugins.js'
        ,array('jquery')
        ,false
        ,true // in footer
    );

    wp_enqueue_script(
        'port.main'
        ,get_template_directory_uri().'/assets/js/main.js'
        ,array('jquery', 'port.plugins')
        ,false
        ,true // in footer
    );
}
