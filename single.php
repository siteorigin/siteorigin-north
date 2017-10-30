<?php
/**
 * The template for displaying all single posts.
 *
 * @package siteorigin-north
 * @license GPL 2.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( has_post_format( array( 'gallery', 'video', 'image' ) ) ) {
				get_template_part( 'template-parts/content', get_post_format() );
			} else {
				get_template_part( 'template-parts/content', 'single' );
			} ?>

			<?php if ( siteorigin_setting( 'navigation_post' ) ) : ?>
				<?php siteorigin_north_the_post_navigation(); ?>
			<?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
