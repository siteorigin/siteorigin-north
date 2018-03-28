<form method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label for='s' class='screen-reader-text'><?php esc_html_e( 'Search for:', 'siteorigin-north' ); ?></label>
	<input type="search" name="s" placeholder="<?php esc_attr_e('Search', 'siteorigin-north') ?>" value="<?php echo get_search_query() ?>" />
	<button type="submit">
		<i class="north-icon-search"><label class="screen-reader-text"><?php esc_html_e( 'Search', 'siteorigin-north' ); ?></label></i>
	</button>
</form>
