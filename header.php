<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
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

$global_social = get_field('opt_socialmedia', 'option') ?: false;
$global_contact = get_field('opt_contact', 'option') ?: false;

$global_logos = get_field('opt_logos', 'option') ?: false;
$global_header = get_field('opt_header', 'option') ?: false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$override_logos = get_field('override_logos') ? get_field('instance_logos')['opt_logos'] : false;
$override_header = get_field('override_header') ? get_field('instance_header')['opt_header'] : false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$page_logos = $override_logos ?: $global_logos;
$page_header = $override_header ?: $global_header;

// ----------------------------------------------------------------------
?>


<body <?php body_class('w-body'); ?>>


<a class="whatsapp-button uk-hidden@s" href="whatsapp://send?text=&phone=+491773184287">
    <img src="<?= get_bloginfo('template_url') ?>/img/whatsapp-button.png" />
</a>


<header class="header header--sticky" id="header" role="banner">
    <div class="alignwide">
        <div class="header-inner">
            <div class="header-container">
                <div class="header-col">
                    <div class="header-item header-item--logo">
                        <?php include_once 'tpl/partials/logo-function.php'; ?><?php include 'tpl/partials/logo.php'; ?>
                    </div>
                </div>
                <div class="header-col">
                    <?php include 'tpl/partials/header-nav.php'; ?><?php include 'tpl/partials/calltoaction.php'; ?><?php include 'tpl/partials/header-contact.php'; ?><?php include 'tpl/partials/header-lang.php'; ?><?php include 'tpl/partials/header-nav-mobile.php'; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="alignwide page-wrapper">
    <?php if ($page_header['show_socialmedia'] && $global_social) { ?>
        <div class="header-meta">
            <div class="header-meta-inner">
                <div class="header-meta-item">
                    <?php $social_profiles = $global_social;
                    include 'tpl/partials/social.php'; ?>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php /* <div class="fixed-sidebar">
        <ul>
            <?php while (have_rows('popup', 'option')) : the_row(); ?>
                <li>
                    <button uk-toggle="target: #modal-<?php echo get_sub_field('id'); ?>" type="button">
                        <?php
                        $icon = get_sub_field('icon');
                        echo baw_svg($icon);
                        ?>
                    </button>
                    <label><?php echo get_sub_field('label'); ?></label>
                </li>
            <?php endwhile; ?>
            <?php if (have_rows('group_popup_filialen', 'option')) : the_row(); ?>
                <li>
                    <button uk-toggle="target: #modal-adressen" type="button">
                        <?php echo baw_svg('solid/map'); ?>
                    </button>
                    <label><?php echo get_sub_field('label'); ?></label>
                </li>
            <?php endif; ?>
        </ul>
    </div> */ ?>


    <?php while (have_rows('popup', 'option')) : the_row(); ?>
        <div id="modal-<?php echo get_sub_field('id'); ?>" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close" type="button">Schließen</button>
                <?php echo get_sub_field('inhalt'); ?>
            </div>
        </div>
    <?php endwhile; ?>

    <div id="modal-adressen" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close" type="button">Schließen</button>
            <?php echo get_sub_field('inhalt'); ?>
            <div uk-grid>
                <?php
                $args = array(
                    'post_type' => 'filiale',
                    'order' => 'ASC',
                );
                $query_filialen = new WP_Query($args);
                ?>
                <?php if ($query_filialen->have_posts()) { ?><?php while ($query_filialen->have_posts()) : $query_filialen->the_post(); ?>
                    <div class="uk-width-1-2@m adress-block">
                        <div>
                            <h3><?php the_title(); ?></h3>
                            <?php echo get_field('anschrift-kontakt'); ?>
                            <?php echo get_field('offnungszeiten'); ?>
                        </div>
                    </div>
                <?php endwhile; ?><?php } ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
