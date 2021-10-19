<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braveandwray
 * @subpackage baw.base
 * @since braveandwray 1.0
 */

include 'post/load-vars.php';
$hide_links = true;

?>

<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

		<div class="post-content">
			<?php include 'post/header.php'; ?>

			<?php if(! $hide_descr) { ?>
				<?php
				if(get_field('team_daten', $theID)) {
					$team_data = get_field('team_daten', $theID);

					$team_fields = array(
						'position'	=> array('icon' => 'solid/user-tie'),
						'email'	=> array('icon' => 'solid/envelope', 'is_url' => true, 'url_prefix' => 'mailto:',),
						'telefon'	=> array('icon' => 'solid/phone', 'is_url' => true, 'url_prefix' => 'tel:'),
						'handy'	=> array('icon' => 'solid/mobile', 'is_url' => true, 'url_prefix' => 'tel:'),
						'fax'	=> array('icon' => 'solid/fax'),
					)

					?>
					<ul class="post-datalist"> <?php
						foreach($team_fields as $key => $field) {
							if($team_data[$key]) {
								echo '<li data-field="'.$key.'">';
									if(isset($field['is_url'])) {
										$url = isset($field['url_prefix']) ? $field['url_prefix'] : '';
										$url .= isset($field['url']) ? $field['url'] : $team_data[$key];
										echo '<a href="'.$url.'">';
									}
									echo baw_svg($field['icon']);
									echo $team_data[$key];
									if(isset($field['is_url'])) {
										echo '</a>';
									}
								echo '</li>';
							}
						}?>
					</ul>

					<?php if($team_data['opt_socialmedia']) { ?>
						<div class="post-socials">
							<?php $social_profiles = $team_data['opt_socialmedia'];
							include 'partials/social.php'; ?>
						</div>
					<?php }
				} ?>
			<?php } ?>
		</div>

	</div>

</article>
