<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<!-- Technical metadata-->
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="all, noydir, noodp">
	<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
	
	<!-- Content metadata -->
	<meta name="author" content="<?php bloginfo("name"); ?>">
	<meta name="copyright" content="<?php echo date("Y"); ?> <?php bloginfo("name"); ?>">
	<meta name="description" content="<?php bloginfo("description"); ?>">
	<meta name="geo.region" content="GB-BST">
	<meta name="geo.placename" content="Bristol">
	<meta name="geo.position" content="51.454513;-2.58791">
	<meta name="ICBM" content="51.454513, -2.58791">

	<!-- Icons -->

	<!-- Facebook OpenGraph -->
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<meta property="og:site_name" content="">

	<!-- Twitter cards -->
	<meta name="twitter:card" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="">
	<meta name="twitter:url" content="">
	<meta name="twitter:site" content="">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dst/css/stylesheet.css">

	<!-- Preload JavaScript -->
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/preload.js"></script>

	<!-- Page title -->
	<title><?php 
		if(is_front_page()):
			bloginfo("name");
			echo " | "; 
			bloginfo("description");
		else:
			wp_title("", true, "right");
			echo " | ";
			bloginfo("name");
		endif;
		?></title>

</head>
<body>

	<!--[if lt IE 9]>
		<div class="browser-warning">You are using an outdated browser that this website wasn't built to support. Functionality and layout may be broken and unusable. Please <a href="http://outdatedbrowser.com/en">upgrade your browser</a> if you are able.</div>
	<![endif]-->

	<ul class="accessibility-links">
		<li><a href="#navigation">Skip to navigation</a></li>
		<li><a href="#content">Skip to content</a></li>
	</ul>

