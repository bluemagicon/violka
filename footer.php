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
				<div class="uk-width-1-4@m uk-width-1-2@s">
                    <h3>Kontakt</h3>
					<div class="footer-item footer-contact">
						<?php include 'tpl/partials/contact.php'; ?>
					</div>
				</div>
			<?php } ?>

            <?php
                $args = array(
                    'post_type' => 'filiale',
                    'order'   => 'ASC',
                );
                $query_filialen = new WP_Query( $args );
            ?>
            <?php if($query_filialen->have_posts()){ ?>
                <?php while($query_filialen->have_posts()) : $query_filialen->the_post(); ?>
                    <div class="uk-width-1-4@m uk-width-1-2@s">
                        <strong class="is-style-h3"><?php the_title(); ?></strong>
                        <?php echo get_field('anschrift-kontakt'); ?>
                    </div>
                <?php endwhile; ?>
            <?php } ?>

            <?php if($page_footer['show_socialmedia'] && $global_social) { ?>
                <div class="uk-width-1-4@m uk-width-1-2@s">
                    <strong class="is-style-h3">Social Media</strong>
                    <div>
                        <div class="footer-item footer-social">
                            <?php $social_profiles = $global_social;
                            include 'tpl/partials/social.php'; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
		</div>
	</div>
    <div class="meta-footer">
        <div class="alignwide uk-flex uk-flex-between uk-flex-middle">
            <div class="uk-width-1-2">
                <?php if($page_footer['show_logo'] && $page_logos) { ?>
                    <div class="footer-item footer-logo">
                        <?php include_once 'tpl/partials/logo-function.php'; ?>
                        <?php include 'tpl/partials/logo.php'; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="uk-width-1-2">
                <?php if(has_nav_menu('footer')) { ?>
                    <div><div class="footer-item footer-menu">
                            <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => false)); ?>
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

</div>

</body>
</html>
