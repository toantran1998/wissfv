<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Naxly
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to <a href="%s">Homepage</a>', 'naxly'), esc_html(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \NAXLY\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'naxly_banner', $data );
$options = naxly_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <!-- error-section -->
    <section class="error-section">
        <div class="pattern-box">
            <div class="pattern pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-50.png);"></div>
            <div class="pattern pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-51.png);"></div>
            <div class="pattern pattern-3" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-52.png);"></div>
            <div class="pattern pattern-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-53.png);"></div>
        </div>
        <div class="auto-container">
            <div class="inner-box centred">
                <figure class="image-box"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/error-1.png" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                <h2><?php echo wp_kses( $options->get( '404-page_title' ), $allowed_html ) ? wp_kses( $options->get( '404-page_title' ), $allowed_html ) : esc_html_e( 'Page is not found', 'naxly' ); ?></h2>
                <p><?php echo wp_kses( $options->get('404-page-text'), $allowed_html ) ? wp_kses($options->get('404-page-text' ), $allowed_html ) : $text; ?></p>
                <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <a href="<?php echo( home_url( '/' ) ); ?>" class="theme-btn style-one"><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back To Home', 'naxly' ); ?><span><?php esc_html_e('+', 'naxly')?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- error-section end -->
     
<?php
}
get_footer(); ?>
