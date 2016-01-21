<?php
/**
 * Template part for displaying posts.
 *
 * @package siteorigin-north
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if( has_post_thumbnail() && siteorigin_setting('blog_featured_archive') ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink() ?>">
				<div class="thumbnail-hover">
					<span class="screen-reader-text"><?php esc_html_e( 'Open post', 'siteorigin-north' ); ?></span>
					<span class="north-icon-add"></span>
				</div>
				<?php the_post_thumbnail() ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<ul class="entry-meta">
				<?php siteorigin_north_post_meta(); ?>
			</ul><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'siteorigin-north' ),
				get_the_title()
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
