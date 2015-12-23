<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset='<?php bloginfo('charset') ?>'>
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php }?>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/global.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" type="text/css">

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">

	<title>Gary Clan</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page-wrap">

		
