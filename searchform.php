<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<input type="search" name="s" aria-label="<?php esc_attr_e( 'Search for', 'siteorigin-north' ); ?>" placeholder="<?php esc_attr_e( 'Search', 'siteorigin-north' ) ?>" value="<?php echo get_search_query() ?>" />
	<button type="submit" aria-label="<?php esc_attr_e( 'Search', 'siteorigin-north' ); ?>">
		<?php siteorigin_north_display_icon( 'search' ); ?>
	</button>
</form>
