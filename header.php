<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-translate-customization" content="d10813b794f2c5e7-d915ed437752f685-gfbc342016883f62f-15"></meta>
<!-- icons & favicons -->
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
<![endif]-->

<!-- html5.js -->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->
<!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/dumbo.css">
<![endif]-->
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/font-awesome-ie7.css">
<![endif]-->
</head>
<body>

<header role="banner">
  <div class="header-wrap" id="top">
  <div id="inner-header" class="clearfix container-fluid">
    <div class="container clearfix">
      <div class="row-fluid" id="site-information">
        <div class="span4" id="branding"><a class="brand" id="logo" title="<?php echo get_bloginfo('name'); ?>" href="<?php echo home_url(); ?>"> <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/SummerCollege_Logo.gif" alt="<?php echo get_bloginfo('name'); ?>"/> <span class="hidden">
          <?php bloginfo('name'); ?>
          </span> </a></div>
        <div class="span8 hidden-phone">
          <div class="row-fluid">
            <div class="pull-right" id="utility-nav">
              
			  <?php bones_utility_nav(); // Adjust using Menus in Wordpress Admin ?>
            </div>
          </div>
          <div class="row-fluid">
            <form class="navbar-search pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <div class="form-bg">
                <label for="s"><span class="hidden">Search</span></label><input name="s" id="s" type="text" class="search-query" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                <button type="submit" class="btn-search">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- end #inner-header --> 
  </div>
  <div class="navbar navbar-top">
      <div class="navbar-inner">
        <div class="container nav-container">
        <div class="container">
          <nav role="navigation"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu<div class="pull-right padMe"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div> </a>
            <div class="nav-collapse collapse">
              <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            </div>
          </nav></div>
        </div>
      </div>
    </div>
</header>
<!-- end header --> 

