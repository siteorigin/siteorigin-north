<?php
/**
 * Loop Name: Blog Loop
 */
?>

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

	<?php endwhile; ?>

	<?php siteorigin_north_posts_pagination(); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
