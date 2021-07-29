<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Theme Kalia
 * @author     Theme Kalia
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>

	<!--Page Title-->
    <section class="page-title style-two text-center">
        <div class="pattern-layer" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1><?php echo wp_kses( $data->get( 'title' ), true ); ?></h1>
                <ul class="bread-crumb clearfix">
                    <?php echo naxly_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
  
<?php endif; ?>