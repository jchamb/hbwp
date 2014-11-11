<?php

// Grab path for includes
$theme_path = get_template_directory();

/**
 * White Label Wordpress
 * Remove default WP branding in admin
 */

include_once $theme_path . '/lib/theme/white-label.php';

/**
 * Include the theme support file
 * Contains logic for setting up theme support items
 */

include_once $theme_path . '/lib/theme/support.php';


/**
 * Include the theme assets file
 * Contains logic for enqueueing styles and scripts
 */

include_once $theme_path . '/lib/theme/assets.php';