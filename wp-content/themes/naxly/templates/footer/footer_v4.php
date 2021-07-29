<?php
/**
 * Footer Template  File
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

$options = naxly_WSH()->option();
$bg_shape_img    = $options->get( 'bg_shape_image' );
$bg_shape_img    = naxly_set( $bg_shape_img, 'url', NAXLY_URI . 'assets/images/shape/shape-31.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!-- footer-style-four -->
<footer class="footer-style-four">
    <div class="pattern-layer" style="background-image: url(<?php echo esc_url($bg_shape_img);?>);"></div>
    <div class="anim-icon">
        <span class="icon icon-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-10.png);"></span>
        <span class="icon icon-5" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-11.png);"></span>
        <span class="icon icon-6" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-12.png);"></span>
    </div>
    <div class="auto-container">
        <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
        <div class="footer-top">
            <div class="widget-section">
                <div class="row clearfix">
                	<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-bottom clearfix">
            <div class="right-column">
                <?php if($options->get( 'footer_menu_4' )):?>
                <ul class="footer-nav">
                    <?php echo wp_kses( $options->get( 'footer_menu_4'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </div>
</footer>
<!-- footer-style-four end -->