<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo ('name'); ?></title>

	<!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/slidebars.css" rel="stylesheet" >
	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" >

    <!-- ACTIVATE WHEN PUTTINGON SERVER -->
    <script type="text/javascript" src="http://fast.fonts.net/jsapi/b6cbf4b5-e916-4d47-8603-9aaa199b2e61.js"></script>
    
    <!-- LOCAL FONTS FOR TESTING - REMOVE BEFORE PLACING ON SERVER
    <link href="<?php bloginfo('template_directory'); ?>/fonts.css" rel="stylesheet"> -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>

	<?php if ( is_front_page() ) get_template_part( 'modalvid' ); ?>

	<!-- NEW MOBILE NAVIGATION -->
    <div id="fixed-top" class="sb-slide visible-xs visible-sm scrollable">
		<span class="sb-toggle-left"><a href="<?php bloginfo('url'); ?>" class="visible-xs visible-sm"><img src="<?php bloginfo('template_directory'); ?>/images/logo_FBSsmall.png" /></a><a href="<?php bloginfo('url'); ?>" class="hidden-xs hidden-sm"><img src="<?php bloginfo('template_directory'); ?>/images/logo_FBSlarge.png" width="160" height="187" /></a></span>
		<div class="sb-toggle-right navbar-right">
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
         	<div class="navicon-line"></div>
         </div>
	</div>
    
    <div id="sb-site"><!-- Start Sidebar Container -->
    
    
    <!-- Static navbar -->
    <nav id="primaryNav" class="navbar navbar-default navbar-fixed-top visible-md visible-lg navLarge" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand fbsLargeShow" href="<?php bloginfo('url'); ?>" id="fbsLogoLarge"><img src="<?php bloginfo('template_directory'); ?>/images/logo_FBSlarge.png" /></a>
          <a class="navbar-brand fbsSmallHide" href="<?php bloginfo('url'); ?>" id="fbsLogoSmall"><img src="<?php bloginfo('template_directory'); ?>/images/logo_FBSsmall.png" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'primary-nav','container' => 'false','menu_class' => 'nav navbar-nav navbar-right')); ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
