<?php
/**
 * Footer Template  File
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

$options = naxly_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!-- footer-style-three -->
<footer class="footer-style-three">
    <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
    <div class="footer-top">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-60.png);"></div>
            <div class="pattern-2 wow slideInDown" data-wow-delay="00ms" data-wow-duration="3500ms" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-61.png);"></div>
        </div>
        <div class="auto-container">
            <div class="widget-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?> 
    <div class="footer-bottom">
        <div class="auto-container clearfix">
            <div class="copyright pull-left">
                <p><?php echo wp_kses( $options->get( 'copyright_text_3', '© <a href="#">Naxly</a> 2020, All Rights Reserved.' ), $allowed_html ); ?></p>
            </div>
            <?php if($options->get( 'footer_menu_2' )):?>
            <ul class="footer-nav pull-right">
                <?php echo wp_kses( $options->get( 'footer_menu_3'), $allowed_html ); ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</footer>
<!-- footer-style-three end -->