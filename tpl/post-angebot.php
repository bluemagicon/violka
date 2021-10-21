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

?>

<article <?php post_class('post post--box'); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">

		<?php if(! $hide_images) { ?>
			<?php include 'post/thumbnail.php'; ?>
		<?php } ?>

		<div class="post-content">
			<?php include 'post/header.php'; ?>
			<?php if(! $hide_descr) { ?>
				<?php the_excerpt(); ?>
			<?php } ?>
            <button uk-toggle="target: #modal-<?php the_ID(); ?>" type="button" class="ghostkit-button">
                Mehr erfahren
            </button>
		</div>
	</div>
</article>
<div id="modal-<?php the_ID(); ?>" class="modal-angebot" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close" type="button">Schließen</button>
        <?php the_content(); ?>
    </div>
</div>