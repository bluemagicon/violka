<?php
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Globale Einstellungen werden geladen

$global_social		= get_field('opt_socialmedia', 'option') ?: false;
$global_contact		= get_field('opt_contact', 'option') ?: false;
$global_support		= get_field('opt_support', 'option') ?: false;

$global_logos 		= get_field('opt_logos', 'option') ?: false;
$global_footer 		= get_field('opt_footer', 'option') ?: false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$override_logos		= get_field('override_logos') ? get_field('instance_logos')['opt_logos'] : false;
$override_footer	= get_field('override_footer') ? get_field('instance_footer')['opt_footer'] : false;
$override_support	= get_field('override_support') ? get_field('instance_support')['opt_support'] : false;

// ----------------------------------------------------------------------
// Überschreibende Einstellungen werden geladen

$page_logos		= $override_logos ?: $global_logos;
$page_footer	= $override_footer ?: $global_footer;
$page_support	= $override_support ?: $global_support;

// ----------------------------------------------------------------------
?>

<footer class="footer">
	<div class="footer-inner">
		<div class="uk-grid uk-grid-large uk-flex-between">


			<?php if($page_footer['show_contact'] && $global_contact) { ?>
				<div class="uk-width-1-2@m uk-width-auto@l">
					<div class="footer-item footer-contact">
						<?php include 'tpl/partials/contact.php'; ?>
					</div>
				</div>
			<?php } ?>


			<?php if($page_footer['footer_text']) { ?>
				<div class="uk-width-1-2@m uk-width-1-3@l">
					<div class="footer-item footer-text">
						<?= $global_footer['footer_text'] ?>
					</div>
				</div>
			<?php } ?>


			<div class="uk-width-auto@l uk-text-right@l">
				<?php if($page_footer['show_logo'] && $page_logos) { ?>
					<div class="footer-item footer-logo">
						<?php include_once 'tpl/partials/logo-function.php'; ?>
						<?php include 'tpl/partials/logo.php'; ?>
					</div>
				<?php } ?>
				<?php if(has_nav_menu('footer')) { ?>
					<div><div class="footer-item footer-menu">
						<?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => false)); ?>
					</div></div>
				<?php } ?>
				<?php if($page_footer['show_socialmedia'] && $global_social) { ?>
					<div><div class="footer-item footer-social">
						<?php $social_profiles = $global_social;
						include 'tpl/partials/social.php'; ?>
					</div></div>
				<?php } ?>
			</div>


		</div>
	</div>
</footer>

<?php
include 'tpl/partials/offcanvas.php';
wp_footer() ;
?>

</body>
</html>
