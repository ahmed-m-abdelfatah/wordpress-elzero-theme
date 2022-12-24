<?php

/**
 * function to add my custom styles
 * by: ahmed abdelfatah
 * wp_enqueue_style($handle, $src, $deps, $ver, $media)
 * get_template_directory_uri()
 */

function add_styles()
{
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . './assets/lib/styles/all.min.css');
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . './assets/lib/styles/bootstrap.min.css');
}

/**
 * function to add my custom styles
 * by: ahmed abdelfatah
 * wp_enqueue_script($handle, $src, $deps, $ver, $in_footer)
 * get_template_directory_uri()
 */

function add_scripts()
{
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . './assets/lib/js/bootstrap.bundle.min.js', array(), false, true);
}
