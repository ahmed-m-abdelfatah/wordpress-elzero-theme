<?php
// include bootstrap navbar Walker
// https://github.com/wp-bootstrap/wp-bootstrap-navwalker
// require_once('wp-bootstrap-navwalker.php'); // not working

// https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
require_once('bootstrap-5-wp-nav-menu-walker.php');

/**
 * function to add my custom styles
 * by: ahmed abdelfatah
 * wp_enqueue_style($handle, $src, $deps, $ver, $media)
 * get_template_directory_uri()
 */

function add_styles()
{
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . './assets_minified/lib/styles/all.min.css');
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . './assets_minified/lib/styles/bootstrap.min.css');
  wp_enqueue_style('main-css', get_template_directory_uri() . './assets_minified/css/all.min.css');
}

/**
 * function to add my custom scripts
 * by: ahmed abdelfatah
 * wp_enqueue_script($handle, $src, $deps, $ver, $in_footer)
 * get_template_directory_uri()
 */

function add_scripts()
{
  /**
   * jquery is registered by wordpress using wp_register_script
   * https://developer.wordpress.org/reference/functions/wp_register_script/
   * https://developer.wordpress.org/reference/functions/wp_enqueue_script/#default-scripts-and-js-libraries-included-and-registered-by-wordpress
   * wp_enqueue_script('jquery');
   */

  // we need to add jquery at the end of the body
  wp_deregister_script('jquery');
  wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), array(), false, true); // registered a new jquery in footer

  // other scripts
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . './assets_minified/lib/js/bootstrap.bundle.min.js', array(), false, true);
  wp_enqueue_script('main-js', get_template_directory_uri() . './assets_minified/js/all.min.js', array(), false, true);
  wp_enqueue_script('html5shiv', get_template_directory_uri() . './assets_minified/lib/js/html5shiv.min.js');
  wp_enqueue_script('respond', get_template_directory_uri() . './assets_minified/lib/js/respond.min.js');

  // add conditionals
  wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
  wp_script_add_data('respond', 'conditional', 'lt IE 9');
}

/**
 * add custom menu support
 * by: ahmed abdelfatah
 *
 * notes:
 * The __() is just an alias for it. So __("some text") is equivalent to gettext("some text")
 * Returns a translated string if one is found in the translation table, or the submitted message if not found.
 * https://stackoverflow.com/a/2427219
 */

function register_custom_menu()
{
  // register_nav_menu('Bootstrap-menu', __('Navigation Bar'));

  register_nav_menus(array(
    'Navigation-Bar' => 'Navigation Bar',
    'Footer-menu' => 'Footer menu',
  ));
}

/**
 * nav menu
 */

function bootstrap_menu()
{
  wp_nav_menu(
    array(
      'theme_location' => 'Navigation-Bar',
      'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
      'container'      => false,
      'depth'          => 2,
      'walker'         => new bootstrap_5_wp_nav_menu_walker(),
    )
  );
}

/**
 * add actions
 * by: ahmed abdelfatah
 * add_action( $hook_name:string, $callback:callable, $priority:integer, $accepted_args:integer )
 */

add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');
add_action('init', 'register_custom_menu');
