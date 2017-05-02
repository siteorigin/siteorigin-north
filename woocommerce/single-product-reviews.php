<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments">
		<h2><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( _n( '%s review for %s', '%s reviews for %s', $count, 'siteorigin-north' ), $count, get_the_title() );
			else
				_e( 'Reviews', 'siteorigin-north' );
		?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'siteorigin-north' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'siteorigin-north' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'siteorigin-north' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'siteorigin-north' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author" class="screen-reader-text">' . __( 'Name', 'siteorigin-north' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" placeholder="' . __( 'Enter Your Name', 'siteorigin-north') . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"><label for="email" class="screen-reader-text">' . __( 'Email', 'siteorigin-north' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" placeholder="' . __( 'Enter Your Email', 'siteorigin-north') . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => __( 'Submit', 'siteorigin-north' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'siteorigin-north' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'siteorigin-north' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'siteorigin-north' ) . '</option>
							<option value="5">' . __( 'Perfect', 'siteorigin-north' ) . '</option>
							<option value="4">' . __( 'Good', 'siteorigin-north' ) . '</option>
							<option value="3">' . __( 'Average', 'siteorigin-north' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'siteorigin-north' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'siteorigin-north' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<div class="comment-form-comment"><label for="comment" class="screen-reader-text">' . __( 'Your Review', 'siteorigin-north' ) . '</label><textarea id="comment" placeholder="' .  __('Your Review', 'siteorigin-north') . '" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'siteorigin-north' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
