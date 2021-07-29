<?php
/**
 * Footer Template  File
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

$options = naxly_WSH()->option();
$back    = $options->get( 'footer_background' );
$back    = naxly_set( $back, 'url', NAXLY_URI . 'assets/images/parallax.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!-- main-footer -->
<footer class="main-footer">
    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
    <div class="footer-top">
        
        <div class="auto-container">
            <div class="widget-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        
    </div>
    <?php } ?> 
    
    <div class="footer-bottom style-one">
        <div class="auto-container clearfix">
            <div class="copyright pull-left">
                <p><?php echo wp_kses( $options->get( 'copyright_text', '© <a href="#">Naxly</a> 2020, All Rights Reserved.' ), $allowed_html ); ?></p>
            </div>
            <?php if($options->get( 'footer_menu' )):?>
			<ul class="footer-nav pull-right">
				<?php echo wp_kses( $options->get( 'footer_menu'), $allowed_html ); ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</footer>
<!-- main-footer end -->  