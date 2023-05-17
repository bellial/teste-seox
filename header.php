<?php

/**
 * The header for your theme.
 *
 * The header template file usually contains your site’s document type, meta information, links to stylesheets and scripts, 
 * and other data.
 * @package seox
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body>

	<?php wp_body_open(); ?>

