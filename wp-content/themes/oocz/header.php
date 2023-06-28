<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="application-name" content="Out of Comfort Zone"/> 
	<meta name="msapplication-TileColor" content="#FFFFFF"/> 
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/medias/images/logos/iepin.png"/>
<?php if (is_single()) { ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<meta property="og:title" content="<?php echo get_the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php if (has_post_thumbnail()) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); echo $large_image_url[0]; } ?>" />
	<meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
	<meta property="og:url" content="<?php echo get_permalink(); ?>" />
	<?php endwhile; ?>
<?php } ?>
	<title><?php 
		// Do not modify; setting required by Yoast WordPress SEO
		wp_title('');
	?></title>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap-responsive.min.css" type="text/css" media="all">
	<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
	
	<!-- START wp_head -->
	<?php wp_head(); ?>
	<!-- END wp_head -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	<?php //coop_fix_sidebar_top_position(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div class="container-fluid">

	<?php 
		if (! is_404()) {
			get_template_part('nav', 'main-menu');
			get_header('hero');
			get_template_part('nav', 'categories');
		}
	?>
