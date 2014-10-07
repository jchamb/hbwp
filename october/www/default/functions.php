<?php

wp_head();

wp_title( $sep, $display, $seplocation );

get_header();
get_footer();
get_sidebar();
get_template_part( $slug, $name );

wp_footer();

