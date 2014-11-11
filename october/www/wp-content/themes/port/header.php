<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title('|'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>
    <body>
        <header class="masthead" id="masthead">
            <h1 class="logo">Port.</h1>
            <?php
                wp_nav_menu(array(
                    'container'        => 'nav'
                    ,'container_class' => 'navigation'
                    ,'theme_location'  => 'main_menu'
                ));
            ?>
            <ul class="social">
                <li><a class="icon-github" href="#"></a></li>
                <li><a class="icon-twitter" href="#"></a></li>
                <li><a class="icon-rdio" href="#"></a></li>
            </ul>
        </header>