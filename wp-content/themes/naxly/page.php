<?php
/**
 * Default Template Main File.
 *
 * @package NAXLY
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \NAXLY\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'naxly_banner', $data );?>
<?php else:?>
    <!--Page Title-->
<section class="page-title style-two text-center">
    <div class="pattern-layer" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1><?php wp_title(''); ?></h1>
        </div>
    </div>
</section>
<!--End Page Title-->
<?php endif;?>

<!--Start blog area-->
<section class="sidebar-page-container blog-modern-sidebar blog-details">
    <div class="auto-container">
        <div class="row clearfix">
		
        	<?php
            if ( $data->get( 'layout' ) == 'left' ) {
                do_action( 'naxly_sidebar', $data );
            }
            ?>
            <div class="content-side blog-details-content <?php echo esc_attr( $class ); ?>">
                <div class="thm-unit-test">
                    <div class="blog-modern-content text">
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="clearfix"></div>
                    <?php
                    $defaults = array(
                        'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'naxly' ),
                        'after'  => '</div>',
    
                    );
                    wp_link_pages( $defaults );
                    ?>
                    <?php comments_template() ?>
                </div>
            </div>
            <?php
            if ( $layout == 'right' ) {
                $data->set('sidebar', 'default-sidebar');
                do_action( 'naxly_sidebar', $data );
            }
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
