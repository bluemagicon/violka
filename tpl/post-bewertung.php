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


$data = get_field('review_daten', $theID);
$stars = $data['stars'] ?: false;

if($stars) {
	$stars = explode('.', $stars);
	$full_stars = $stars[0];
	$half_star = isset($stars[1]) ? true : false;
}

?>

<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

		<div class="post-content">
			<header class="post-header">
	            <p class="post-stars">
					<?php if($stars) { ?>
						<?php for($i=0; $i<$full_stars; $i++) { ?>
							<?= baw_svg('solid/star') ?>
						<?php } ?>
					<?php } ?>
					<?php if($half_star) { ?>
						<?= baw_svg('solid/star-half-alt') ?>
					<?php } ?>
	            </p>

				<p class="post-title">
					<strong><?= get_the_title() ?></strong>
					<?php if($data['subheadline']) { ?>
						&nbsp;<?= $data['subheadline'] ?>
					<?php } ?>
				</p>
			</header>

			<?php if(! $hide_descr) { ?>

				<?php
				if($data['text']) {
					echo $data['text'];
				} elseif(has_excerpt()) {
					the_excerpt();
				}
				?>
			<?php } ?>
		</div>

	</div>

</article>
