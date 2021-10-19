<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="apple-mobile-web-app-title" content="<?= bloginfo('name') ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php /*
	<link rel="preload" href="<?= get_bloginfo('template_url') ?>/dist/fonts/source-sans-pro-v13-latin-regular.woff2" as="font" crossorigin="anonymous" />
	<link rel="preload" href="<?= get_bloginfo('template_url') ?>/dist/fonts/source-sans-pro-v13-latin-600.woff2" as="font" crossorigin="anonymous" />
	<link rel="preload" href="<?= get_bloginfo('template_url') ?>/dist/fonts/source-sans-pro-v13-latin-700.woff2" as="font" crossorigin="anonymous" />
	*/ ?>

	<?php wp_head(); ?>

</head>


<?php
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Globale Einstellungen werden geladen

$global_social		= get_field('opt_socialmedia', 'option') ?: false;
$global_contact		= get_field('opt_contact', 'option') ?: false;

$global_logos 		= get_field('opt_logos', 'option') ?: false;
$global_header 		= get_field('opt_header', 'option') ?: false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$override_logos		= get_field('override_logos') ? get_field('instance_logos')['opt_logos'] : false;
$override_header	= get_field('override_header') ? get_field('instance_header')['opt_header'] : false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$page_logos		= $override_logos ?: $global_logos;
$page_header	= $override_header ?: $global_header;

// ----------------------------------------------------------------------
?>


<body <?php body_class('w-body'); ?>>

	<?php if($page_header['show_socialmedia'] && $global_social) { ?>
		<div class="header-meta">
			<div class="header-meta-inner">
				<div class="header-meta-item">
					<?php $social_profiles = $global_social;
					include 'tpl/partials/social.php'; ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<header class="header header--sticky" id="header" role="banner">
		<div class="header-inner">
			<div class="header-container">
				<div class="header-col">
				    <div class="header-item header-item--logo">
						<?php include_once 'tpl/partials/logo-function.php'; ?>
						<?php include 'tpl/partials/logo.php'; ?>
					</div>
				</div>
				<div class="header-col">
					<?php include 'tpl/partials/header-nav.php'; ?>
					<?php include 'tpl/partials/calltoaction.php'; ?>
					<?php include 'tpl/partials/header-contact.php'; ?>
					<?php include 'tpl/partials/header-lang.php'; ?>
					<?php include 'tpl/partials/header-nav-mobile.php'; ?>
				</div>
			</div>
		</div>
	</header>
