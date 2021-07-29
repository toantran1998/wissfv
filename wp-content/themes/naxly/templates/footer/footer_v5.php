<?php
/**
 * Footer Template  File
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

$options = naxly_WSH()->option();
$bg_shape_img_2    = $options->get( 'bg_shape_image_2' );
$bg_shape_img_2    = naxly_set( $bg_shape_img_2, 'url', NAXLY_URI . 'assets/images/shape/shape-45.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!-- footer-style-five -->
<footer class="footer-style-five">
    <div class="pattern-layer" style="background-image: url(<?php echo esc_url($bg_shape_img_2);?>);"></div>
    <div class="auto-container">
        <?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) { ?>
        <div class="footer-top">
            <div class="widget-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar-5' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-bottom clearfix">
            <div class="copyright pull-left">
                <p><?php echo wp_kses( $options->get( 'copyright_text5', '© <a href="#">Naxly</a> 2020, All Rights Reserved.' ), $allowed_html ); ?></p>
            </div>
            <?php if($options->get( 'footer_menu_2' )):?>
            <ul class="footer-nav pull-right">
                <?php echo wp_kses( $options->get( 'footer_menu_2'), $allowed_html ); ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</footer>
<!-- footer-style-five end -->