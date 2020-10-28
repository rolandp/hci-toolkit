<?php
$last = cookie(); //handles cookie for last comment functionality
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage HCI-Toolkit
 */
?><!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" media="all and (max-width: 768px)" href="<?php bloginfo('template_directory'); ?>/style768.css" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/libs/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/libs/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/animations.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/analytics.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/libs/modernizr-1.7.min.js"></script>

<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	//wp_head();
?>
<!-- template dir for javascript -->
<script type="text/javascript">
var templateDir = "<?php bloginfo('template_directory') ?>";
var newComments = "<?php echo newComments($last); ?>"; //requests amount of new comments since last visit
</script>
</head>

<body <?php body_class(); ?>>
<div id="container">
<header id="branding" role="banner">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/images/hci-toolkit.png" alt="HCI Toolkit" title="HCI Toolkit" /></a>
	<nav>
		<ul>
			<li <?php if(is_home()){echo "class='current_page_item'";}?>><a class="no-left" href="<?php echo get_option('home'); ?>/">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
		</ul>
	</nav>
</header><!-- #branding -->

