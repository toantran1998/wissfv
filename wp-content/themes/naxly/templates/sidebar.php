<?php

/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage NAXLY
 * @author     ThemeKalia
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
    	<aside class="sidebar blog-sidebar">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</aside>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}
?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
    	<div class="sidebar">
			<?php dynamic_sidebar( $options ); ?>
		</div>
	</div>
<?php endif; ?>

