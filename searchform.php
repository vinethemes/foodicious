<?php
/**
 * Search form template
 *
 * @package foodicious
 * @since foodicious 1.0
 */
?>
	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'foodicious' ); ?></label>
		<input type="text" class="field" placeholder="<?php esc_attr_e( 'Search','foodicious' ); ?>"  name="s" value="<?php echo get_search_query(); ?>" id="s" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'foodicious' ); ?>" />
	</form>