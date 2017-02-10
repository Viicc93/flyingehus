<!DOCTYPE html>
<html>

<head>
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>

<body <?php body_class(); ?>>
  <header>
  <!--<div id="logo" style="background-image: url('<?php bloginfo('url'); ?>/wp-content/themes/fso_eventing_theme/img/logo.jpg');"></div>-->
  <div class="info"></div>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url')?>"><img src="" alt=""></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">

            <?php
                wp_nav_menu( array(
                    'menu' => 'primarynav',
                    'menu_id'=>'primarynav',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav',
                    'walker' => new wp_bootstrap_navwalker())
                );
            ?>
          </div>
    </nav>
  </header>
