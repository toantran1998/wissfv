<?php
/**
 * Search Form template
 *
 * @package NAXLY
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="sidebar-search">
    <div class="search-box">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
            <div class="form-group">
                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Keyword...', 'naxly' ); ?>" required="">
                <button type="submit" class="theme-btn style-one"><?php echo esc_attr_e( 'Search', 'naxly' ); ?></button>
            </div>
        </form>
    </div>
</div>