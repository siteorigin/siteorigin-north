<form method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<input type="search" name="s" aria-label="<?php esc_attr_e( 'Search for', 'siteorigin-north' ); ?>" placeholder="<?php esc_attr_e('Search', 'siteorigin-north') ?>" value="<?php echo get_search_query() ?>" />
	<button type="submit" aria-label="<?php esc_attr_e( 'Search', 'siteorigin-north' ); ?>">
		<i class="north-icon-search"></i>
	</button>
</form>
