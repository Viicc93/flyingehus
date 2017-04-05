<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php wp_head(); ?>
  <title>FLYINGEHUS<?php if(!is_home()) echo ' || ' . get_the_title(); ?></title>
</head>

<body <?php body_class(); ?>>
  <div class="flyingehus-container">
  <header>
    <div id="logo">
      <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/themes/flyingehus_theme/assets/images/logo_flyingehus.png"/></a>
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">

            <?php
                wp_nav_menu( array(
                    'menu' => 'primarynav',
                    'menu_id'=>'primarynav',
                    'theme_location' => 'primarymenu',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav navbar-nav',
                    'walker' => new wp_bootstrap_navwalker())
                );
            ?>
          </div>
    </nav>
  </header>
  <div class="clearfix">
