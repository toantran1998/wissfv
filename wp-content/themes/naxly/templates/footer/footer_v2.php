<?php
/**
 * Footer Template  File
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

$options = naxly_WSH()->option();
$footer_logo    = $options->get( 'footer_logo_img' );
$footer_logo    = naxly_set( $footer_logo, 'url', NAXLY_URI . 'assets/images/footer-logo-2.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!-- footer-style-two -->
<footer class="footer-style-two bg-color-3">
    <div class="auto-container">
        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
        <div class="footer-top">
            <div class="widget-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                </div>
            </div>
        </div>
        <?php } ?> 
        
        <div class="footer-bottom clearfix">
            <div class="left-column pull-left">
                <div class="copyright">
                    <p><?php echo wp_kses( $options->get( 'copyright_text2', '© <a href="#">Naxly</a> 2020, All Rights Reserved.' ), $allowed_html ); ?></p>
                </div>
                <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
            </div>
            <div class="right-column pull-right">
                <?php if($options->get( 'footer_menu_2' )):?>
                <ul class="footer-nav">
                    <?php echo wp_kses( $options->get( 'footer_menu_2'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
    </div>
</footer>
<!-- footer-style-two end -->