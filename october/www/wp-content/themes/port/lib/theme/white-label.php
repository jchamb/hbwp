<?php
/**
 * change the logo on the login page
 * @return [type] [description]
 */
function change_login_logo()
{
    echo '<style type="text/css">
            h1 a { background-image:url('.get_template_directory_uri().'/assets/img/logo-foster.png) !important; background-size: 184px 121px !important; height: 121px !important; width: 184px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
            .login form { margin-top: 25px !important; }
            #nav { float: right !important; width: 50%; padding: 0 !important; text-align: right !important; }
            #backtoblog { float: left !important; width: 50%; padding: 0 !important; margin-top: 24px; }
         </style>';
}
// add_action( 'login_head', 'change_login_logo' );



/**
 * Removes Items from the sidebar that aren't need
 * @return void
 */
function remove_admin_menu_items()
{
    global $menu;
    $remove_menu_items = array(__('Comments'));

    end ($menu);
    while (prev($menu))
    {
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items))
        {
            unset($menu[key($menu)]);
        }
    }
}
// add_action( 'admin_menu', 'remove_admin_menu_items');


/**
 * Removes nodes from admin bar to make for white labeled
 * @param  class $wp_toolbar the wordpress toool bar instance
 * @return class             returns the modifies
 */
function remove_admin_bar_menus($wp_toolbar)
{
    $wp_toolbar->remove_node( 'wp-logo' );

    return $wp_toolbar;
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 999 );



/**
 * Remove the defualt dashboard widgets  for orgs
 * @return null
 */
function remove_dashboard_widgets()
{
    // remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets', 0 );



function remove_footer_text($text)
{
    return '';
}
add_filter( 'update_footer',  'remove_footer_text', 999);
add_filter( 'admin_footer_text',  'remove_footer_text');