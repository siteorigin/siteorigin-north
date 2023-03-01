<?php
/**
 * The template used for displaying page content in page.php
 *
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( siteorigin_page_setting( 'page_title' ) || siteorigin_page_setting( 'featured_image' ) ) { ?>
		<header class="entry-header">
			<?php if ( has_post_thumbnail() && siteorigin_page_setting( 'featured_image' ) ) { ?>
				<div class="entry-thumbnail"><?php siteorigin_north_entry_thumbnail(); ?></div>
			<?php } ?>
			<?php if ( siteorigin_page_setting( 'page_title' ) ) { ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php } ?>
		</header><!-- .entry-header -->
	<?php } ?>

	<?php siteorigin_north_breadcrumbs(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
				'after'  => '</div>',
			) );
?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
