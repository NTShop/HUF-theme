<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <title><?php wp_title(''); ?></title>
    
    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1, user-scalable=no">

    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
    <![endif]-->
    
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Favicon and Feed -->
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
    
    <!--  iPhone Web App Home Screen Icon -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-icon-ipad-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-icon-retina-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-icon-precomposed.png" />
    
    <!-- Enable Startup Image for iOS Home Screen Web App -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-startup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/mobile-load.png" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- Startup Image iPad Landscape (748x1024) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
    <!-- Startup Image iPad Portrait (768x1004) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
    <!-- Startup Image iPhone (320x460) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/images/devices/huf-load.png" media="screen and (max-device-width: 320px)" />
    
    <!-- If jQuery already load, remove the line -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui/css/custom-theme/jquery-ui-1.8.18.custom.css" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui/jquery-ui-1.8.18.custom.min.js"></script>
    
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>

    <?php /*
    <!--audio.js-->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/audiojs/audio.min.js"></script>
    <script>
      audiojs.events.ready(function() {
        var as = audiojs.createAll();
      });
    </script>
    
    <!--video js -->
    <link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/c/video.js"></script>
    */?>

    <?php /*
    <!--JW Player -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jwplayer-5.9/jwplayer.js"></script>
    */?>
    
    <!-- mediaelement.js http://mediaelementjs.com -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/mediaelement/mediaelement-and-player.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mediaelementplayer.css" />

    
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/fancybox/jquery.fancybox.css?v=2.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/fancybox/jquery.fancybox.pack.js?v=2.0.5"></script>
    
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <div id="topbar">
        <?php if ( is_user_logged_in() ) : ?>
            <?php //if logged in show this menu
            wp_nav_menu(array('theme_location' => 'user_navigation', 'container' => false, 'menu_class' => 'row top-nav')); ?>
        <?php else : ?>
            <?php //if not logged in show this menu
            wp_nav_menu(array('theme_location' => 'utility_navigation', 'container' => false, 'menu_class' => 'row top-nav')); ?>
        <?php endif; ?>

    </div>

    <!-- Start the main container -->
    <div id="container" class="container" role="document">
        
        <!-- Row for blog navigation -->
        <div class="row">
            <header class="twelve columns" role="banner">
                <div class="reverie-header clearfix">
                    <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php get_search_form( $echo ); ?>
                    <nav role="navigation">
                        <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'main-nav')); ?>
                    </nav>
                </div>
            </header>
        </div>
        
        <!-- Row for main content area -->
        <div id="main" class="row">