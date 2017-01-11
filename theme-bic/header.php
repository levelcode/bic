<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
  
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
    <meta property="og:image" content="" />

    <!-- Fav and touch icons -->
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/favicon.png" />

   
    <?php if ( is_admin_bar_showing() ) {?>
    	<style>
    		#site-navigation { top: 28px !important; }
    	</style>
    <?php }?>
    
  </head>

<body <?php body_class(); ?>>

  <div id="site-navigation" class="navbar navbar-fixed-top" role="navigation">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <i class="icon-chevron-down"></i>
        </button>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <div class="nav-collapse collapse">
    	  	<?php
              wp_nav_menu( array(
                  'theme_location'    => 'top_menu',
                  'depth'             => 2,
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
          ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>