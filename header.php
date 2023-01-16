<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset"); ?>" />
  <title>
    <?php wp_title('|', 'true', 'right') ?>
    <?php bloginfo("name"); ?></title>
  <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>" />
  <?php wp_head(); ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <?php
    if (is_single()) {
      echo '<div class="container-fluid">';
    } else {
      echo '<div class="container">';
    }
    ?>
    <!-- <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><?php bloginfo('name');  ?></a> -->
    <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name');  ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php bootstrap_menu(); ?>
    </div>
    </div>
  </nav>