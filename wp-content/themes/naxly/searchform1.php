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
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="form-group">
        <fieldset>
            <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search here', 'naxly' ); ?>" required >
            <input type="submit" value="Search Now!" class="theme-btn style-four">
        </fieldset>
    </div>
</form>
