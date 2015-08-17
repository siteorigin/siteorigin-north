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
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'siteorigin-north' ); ?></h2>
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

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
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
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'siteorigin_north_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function siteorigin_north_posted_on() {
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

	?>
	<li class="posted-on">
		<span class="meta-icon north-icon-calendar"></span>
		<a href="<?php the_permalink() ?>">
			<?php echo $time_string ?>
		</a>
	</li>
	<li class="posted-by">
		<span class="meta-icon north-icon-user"></span>
		<?php echo $byline ?>
	</li>
	<li class="post-comments">
		<span class="meta-icon north-icon-comments"></span>
		<a href="<?php the_permalink() ?>#comments">
			<?php echo $comments ?>
		</a>
	</li>
	<?php
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
//		$categories_list = get_the_category_list( esc_html__( ', ', 'siteorigin-north' ) );
//		if ( $categories_list && siteorigin_north_categorized_blog() ) {
//			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'siteorigin-north' ) . '</span>', $categories_list ); // WPCS: XSS OK.
//		}

		/* translators: used between list items, there is a space after the comma */
		the_tags( '<div class="tags-list">', '', '</div>' );
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'siteorigin-north' ), esc_html__( '1 Comment', 'siteorigin-north' ), esc_html__( '% Comments', 'siteorigin-north' ) );
		echo '</span>';
	}

	// edit_post_link( esc_html__( 'Edit', 'siteorigin-north' ), '<span class="edit-link">', '</span>' );
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

		$args = array(
			'next_text' => '<span class="north-icon-double-next"></span>',
			'prev_text' => '<span class="north-icon-double-previous"></span>',
			'end_size'     => 3,
			'mid_size'     => 3
		);

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

		?><div class="post-pagination"><?php
		echo paginate_links( $args );
		?></div><?php
	}

endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'siteorigin-north' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'siteorigin-north' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'siteorigin-north' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'siteorigin-north' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'siteorigin-north' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'siteorigin-north' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'siteorigin-north' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'siteorigin-north' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'siteorigin-north' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'siteorigin-north' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'siteorigin-north' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'siteorigin-north' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'siteorigin-north' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'siteorigin-north' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK.
	}
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
				<span class="author"><?php comment_author_link() ?></span>
				-
				<span class="date"><?php comment_date() ?></span>
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
