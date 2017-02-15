<?php
/**
 * Template part for displaying single gallery format posts.
 *
 * @package siteorigin-north
 * @license GPL 2.0
 */

$gallery = get_post_gallery( get_the_ID(), false );
$content = siteorigin_north_strip_gallery( get_the_content() );
$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if ( $gallery != '' ) : ?>
		<div class="flexslider gallery-format-slider">
			<ul class="slides gallery-format-slides">
				<?php foreach ( $gallery['src'] as $image ) : ?>
					<li class="gallery-format-slide">
						<img src="<?php echo $image; ?>">
					</li>
				<?php endforeach; ?>
			<ul>
		</div>
	<?php elseif ( is_singular() && has_post_thumbnail() && siteorigin_setting( 'blog_featured_single' ) ) : ?>
		<div class="entry-thumbnail">
			<?php siteorigin_north_entry_thumbnail() ?>
		</div>
	<?php elseif ( has_post_thumbnail() && siteorigin_setting( 'blog_featured_archive' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink() ?>">
				<div class="thumbnail-hover">
					<span class="screen-reader-text"><?php esc_html_e( 'Open post', 'siteorigin-north' ); ?></span>
					<span class="north-icon-add"></span>
				</div>
				<?php siteorigin_north_entry_thumbnail() ?>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( is_singular() ) : ?>
		<?php if ( siteorigin_page_setting( 'page_title' ) ) : ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php endif; ?>

		<?php siteorigin_north_breadcrumbs(); ?>

		<?php if( siteorigin_page_setting( 'page_title' ) ) : ?>
				<div class="entry-meta">
					<?php siteorigin_north_post_meta(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
		<?php endif; ?>
	<?php else : ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
				<ul class="entry-meta">
					<?php siteorigin_north_post_meta(); ?>
				</ul><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( is_singular() ) : ?>
			<?php echo $content; // Display the content without gallery ?>
		<?php elseif ( siteorigin_setting( 'blog_post_content' ) == 'content' ) : ?>
			<?php the_content( sprintf(
				siteorigin_setting( 'blog_read_more_text' ) . esc_html__( '<span class="screen-reader-text"> "%s"</span>', 'siteorigin-north' ),
				get_the_title()
			) ); ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
			<?php if ( siteorigin_setting( 'blog_excerpt_post_link' ) ) { ?>
				<a href="<?php the_permalink() ?>" class="more-link"><?php echo siteorigin_setting( 'blog_read_more_text' ) ?><span class="screen-reader-text">More Tag</span></a>
			<?php } ?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_singular() ) : ?>
		<footer class="entry-footer">
			<?php siteorigin_north_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
