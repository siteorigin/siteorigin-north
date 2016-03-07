<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package siteorigin-north
 */

if( !function_exists('siteorigin_north_display_logo') ):
/**
 * Display the logo or site title
 */
function siteorigin_north_display_logo(){
	$logo = siteorigin_setting( 'branding_logo' );
	if( !empty($logo) ) {
		$logo_id = attachment_url_to_postid( $logo );
		$attrs = apply_filters( 'siteorigin_north_logo_attributes', array() );

		?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
		echo wp_get_attachment_image( $logo_id, 'full', false, $attrs );
		?></a><?php

	}
	else {
		?><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php
	}
}
endif;

if( !function_exists('siteorigin_north_display_retina_logo') ):
/**
 * Display a retina ready logo
 */
function siteorigin_north_display_retina_logo( $attr ){
	$logo = siteorigin_setting( 'branding_logo' );
	$retina = siteorigin_setting( 'branding_retina_logo' );
	if( !empty($retina) ) {
		$attr['srcset'] = $logo . ' 1x,' . $retina . ' 2x';
		return $attr;
	}
}
add_filter( 'siteorigin_north_logo_attributes', 'siteorigin_north_display_retina_logo', 10, 1 );
endif;

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'siteorigin-north' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( esc_html__( 'Older posts', 'siteorigin-north' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'siteorigin-north' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'siteorigin_north_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function siteorigin_north_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'siteorigin-north' ); ?></h2>
		<div class="nav-links">
			<?php
			if ( is_rtl() ) {
				previous_post_link( '<div class="nav-previous"><span class="north-icon-next"></span>%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link<span class="north-icon-previous"></span></div>', '%title' );
			} else {
				previous_post_link( '<div class="nav-previous"><span class="north-icon-previous"></span>%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link<span class="north-icon-next"></span></div>', '%title' );
			}
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'siteorigin_north_post_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function siteorigin_north_post_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'siteorigin-north' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$comments = sprintf(
		_nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'siteorigin-north' ),
		number_format_i18n( get_comments_number() )
	);


	if( siteorigin_setting('blog_display_date') ) {
		?>
		<li class="posted-on">
			<span class="meta-icon north-icon-calendar" aria-hidden="true"></span>
			<a href="<?php the_permalink() ?>">
				<?php echo $time_string ?>
			</a>
		</li>
		<?php
	}
	if( siteorigin_setting('blog_display_author') ) {
		?>
		<li class="posted-by">
			<span class="meta-icon north-icon-user" aria-hidden="true"></span>
			<?php echo $byline ?>
		</li>
		<?php
	}
	if( get_comments_number() > 0 && siteorigin_setting('blog_display_comment_count') ) {
		?>
		<li class="post-comments">
			<span class="meta-icon north-icon-comments" aria-hidden="true"></span>
			<a href="<?php the_permalink() ?>#comments">
				<?php echo $comments ?>
			</a>
		</li>
		<?php
	}
}
endif;

if ( ! function_exists( 'siteorigin_north_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function siteorigin_north_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'siteorigin-north' ) );
		if ( $categories_list && siteorigin_north_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'siteorigin-north' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		the_tags( '<div class="tags-list">', '', '</div>' );

		if ( siteorigin_setting('blog_display_author_box') ) { ?>
			<div class="author-box">
				<h2 class="author-title">
					<?php echo get_the_author(); ?>
					<small class="author-info">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
							<?php _e( 'View posts by ', 'siteorigin-north' );
							echo get_the_author(); ?>
						</a>
					</small>
				</h2>
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
				</div>
				<div class="author-description">
					<?php echo wp_kses( get_the_author_meta( 'description' ), null ); ?>
				</div>
				<div class="clear"></div>
			</div>
		<?php }

	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'siteorigin-north' ), esc_html__( '1 Comment', 'siteorigin-north' ), esc_html__( '% Comments', 'siteorigin-north' ) );
		echo '</span>';
	}
}
endif;

if( !function_exists('siteorigin_north_posts_pagination') ) :

	/**
	 * Display pagination
	 */
	function siteorigin_north_posts_pagination(){
		global $wp_query;
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		if ( is_rtl() ) {
			$args = array(
				'next_text' => '<span class="north-icon-double-previous"></span>',
				'prev_text' => '<span class="north-icon-double-next"></span>',
				'end_size'     => 3,
				'mid_size'     => 3
			);
		} else {
			$args = array(
				'next_text' => '<span class="north-icon-double-next"></span>',
				'prev_text' => '<span class="north-icon-double-previous"></span>',
				'end_size'     => 3,
				'mid_size'     => 3
			);
		}

		if( is_search() ) {
			// Add the arguments neccessary for search
			global $wp_query;
			$big = 999999999; // need an unlikely integer
			$args = wp_parse_args( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			), $args);
		}

		?><div class="post-pagination">
		<h2 class="screen-reader-text"><?php esc_html_e('Posts navigation', 'siteorigin-north'); ?></h2><?php
		echo paginate_links( $args );
		?></div><?php
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function siteorigin_north_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'siteorigin_north_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'siteorigin_north_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so siteorigin_north_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so siteorigin_north_categorized_blog should return false.
		return false;
	}
}

if( !function_exists('siteorigin_north_comment') ) :
function siteorigin_north_comment( $comment, $args, $depth ){
	?>
	<li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
		<?php $type = get_comment_type($comment->comment_ID); ?>
		<?php if($type == 'comment') : ?>
			<div class="avatar-container">
				<?php echo get_avatar(get_comment_author_email(), 80) ?>
			</div>
		<?php endif; ?>

		<div class="comment-container">
			<?php if($depth <= $args['max_depth']) : ?>
				<?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?>
			<?php endif; ?>

			<div class="info">
				<?php if( is_rtl() ) : ?>
					<span class="date"><?php comment_date() ?></span>
					-
					<span class="author"><?php comment_author_link() ?></span>
				<?php else : ?>
					<span class="author"><?php comment_author_link() ?></span>
					-
					<span class="date"><?php comment_date() ?></span>
				<?php endif; ?>
			</div>

			<div class="comment-content content">
				<?php comment_text() ?>
			</div>
		</div>

		<div class="clear"></div>
	<?php
}
endif;

if( !function_exists('siteorigin_north_footer_text') ) :
function siteorigin_north_footer_text(){
	$text = siteorigin_setting('footer_text');
	$text = str_replace(
		array( '{sitename}', '{year}'),
		array( get_bloginfo('sitename'), date('Y') ),
		$text
	);
	echo wp_kses_post( $text );
}
endif;


/**
 * Flush out the transients used in siteorigin_north_categorized_blog.
 */
function siteorigin_north_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'siteorigin_north_categories' );
}
add_action( 'edit_category', 'siteorigin_north_category_transient_flusher' );
add_action( 'save_post',     'siteorigin_north_category_transient_flusher' );

function siteorigin_north_display_icon( $type ){
	switch($type) {
		case 'menu':
			?>
			<svg version="1.1" class="svg-icon-menu" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
				<path class="line-1" d="M3,5h18c0.3,0,0.5,0.1,0.7,0.3C21.9,5.5,22,5.7,22,6s-0.1,0.5-0.3,0.7C21.5,6.9,21.3,7,21,7H3 C2.7,7,2.5,6.9,2.3,6.7C2.1,6.5,2,6.3,2,6s0.1-0.5,0.3-0.7C2.5,5.1,2.7,5,3,5z"/>
				<path class="line-2" d="M3,11h18c0.3,0,0.5,0.1,0.7,0.3S22,11.7,22,12s-0.1,0.5-0.3,0.7S21.3,13,21,13H3c-0.3,0-0.5-0.1-0.7-0.3 C2.1,12.5,2,12.3,2,12s0.1-0.5,0.3-0.7C2.5,11.1,2.7,11,3,11z"/>
				<path class="line-3" d="M3,17h18c0.3,0,0.5,0.1,0.7,0.3S22,17.7,22,18s-0.1,0.5-0.3,0.7S21.3,19,21,19H3c-0.3,0-0.5-0.1-0.7-0.3 C2.1,18.5,2,18.3,2,18s0.1-0.5,0.3-0.7C2.5,17.1,2.7,17,3,17z"/>
			</svg>
			<?php
			break;

		case 'close' :
			?>
			<svg version="1.1" class="svg-icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="12px" y="12px"
				 viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
				<path class="circle" d="M22.1,7.7c-0.6-1.4-1.4-2.5-2.3-3.5c-1-1-2.2-1.8-3.5-2.3C14.9,1.3,13.5,1,12,1S9.1,1.3,7.7,1.9
				C6.4,2.5,5.2,3.2,4.2,4.2c-1,1-1.8,2.2-2.3,3.5C1.3,9.1,1,10.5,1,12c0,1.5,0.3,2.9,0.9,4.3c0.6,1.4,1.4,2.5,2.3,3.5
				c1,1,2.2,1.8,3.5,2.3C9.1,22.7,10.5,23,12,23s2.9-0.3,4.3-0.9c1.4-0.6,2.5-1.4,3.5-2.3c1-1,1.8-2.2,2.3-3.5
				c0.6-1.4,0.9-2.8,0.9-4.3C23,10.5,22.7,9.1,22.1,7.7z M20.3,15.5c-0.5,1.1-1.1,2.1-1.9,2.9s-1.8,1.4-2.9,1.9
				C14.4,20.8,13.2,21,12,21s-2.4-0.2-3.5-0.7c-1.1-0.5-2.1-1.1-2.9-1.9s-1.4-1.8-1.9-2.9C3.2,14.4,3,13.2,3,12
				c0-1.2,0.2-2.4,0.7-3.5c0.5-1.1,1.1-2.1,1.9-2.9s1.8-1.4,2.9-1.9C9.6,3.2,10.8,3,12,3s2.4,0.2,3.5,0.7c1.1,0.5,2.1,1.1,2.9,1.9
				s1.4,1.8,1.9,2.9C20.8,9.6,21,10.8,21,12C21,13.2,20.8,14.4,20.3,15.5z"/>
				<path class="cross" d="M14.8,8.2c0.3,0,0.5,0.1,0.7,0.3c0.2,0.2,0.3,0.4,0.3,0.7s-0.1,0.5-0.3,0.7L13.4,12l2.1,2.1
				c0.2,0.2,0.3,0.4,0.3,0.7c0,0.3-0.1,0.5-0.3,0.7s-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3L12,13.4l-2.1,2.1
				c-0.2,0.2-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3s-0.3-0.4-0.3-0.7c0-0.3,0.1-0.5,0.3-0.7l2.1-2.1L8.5,9.9
				C8.3,9.7,8.2,9.4,8.2,9.2c0-0.3,0.1-0.5,0.3-0.7s0.4-0.3,0.7-0.3s0.5,0.1,0.7,0.3l2.1,2.1l2.1-2.1C14.3,8.3,14.6,8.2,14.8,8.2z"/>
			</svg>
			<?php
			break;
	}
}

if ( ! function_exists( 'siteorigin_north_breadcrumbs' ) ) :
/**
 * Display's breadcrumbs supported by Yoast SEO & Breadcrumb NavXT.
 */
function siteorigin_north_breadcrumbs() {
	if( function_exists('bcn_display') ) {
		?><div class="breadcrumbs">
			<?php bcn_display(); ?>
		</div><?php
	} elseif( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<div class="breadcrumbs">','</div>');
	}
}
endif;
