<?php
/*
Plugin Name: Portfolio
Plugin URI: http://jchamb.com
Description: Adds portfolio post type
Version: 1.0
Author: Jake Chamberlain
Author URI: http://jchamb.com/
*/

add_action('init', 'add_project_post_type' );

function add_project_post_type()
{
    register_post_type(
        'project'
        ,array(
            'labels' => array(
                 'name' => 'Portfolio'
                ,'singular_name' => 'Project'
                ,'add_new' => 'New Project'
                ,'add_new_item' => 'Add New Project'
                ,'edit_item' => 'Edit Project'
                ,'new_item' => 'New Project'
                ,'all_items' => 'All Projects'
                ,'view_item' => 'View Project'
                ,'search_items' => 'Search Projects'
                ,'not_found' =>  'No project found'
                ,'not_found_in_trash' => 'No projects found in trash'
                ,'parent_item_colon' => ''
                ,'menu_name' => 'Portfolio'
            )
            ,'public' => true
            ,'has_archive' => false
            ,'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false )
            ,'show_ui' => true
            ,'show_in_nav_menus' => false
            ,'show_in_menu' => true
            ,'supports' => array('title','editor','thumbnail')
            ,'menu_icon' => 'dashicons-format-gallery'
        )
    );
}