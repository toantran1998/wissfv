<?php
/**
 * Tag Main File.
 *
 * @package NAXLY
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \NAXLY\Includes\Classes\Common::instance()->data( 'search' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
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
    <section class="sidebar-page-container blog-modern-sidebar">
        <div class="auto-container">
            <div class="row clearfix">
                <?php
                        if ( $data->get( 'layout' ) == 'left' ) {
                            do_action( 'naxly_sidebar', $data );
                        }
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                	<div class="blog-modern-content">
                    	<div class="thm-unit-test">
							<?php if( have_posts() ) : ?>
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    naxly_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                        
                        <!--Pagination-->
                        <div class="pagination-wrapper text-right clearfix">
                            <?php naxly_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                        
                        <?php else : ?>
							<div class="search-notfound">
								<h4>
									<?php printf(esc_html__( 'No result found for "%s"', 'naxly' ), get_search_query()); ?>
								</h4>
								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'naxly' ); ?></p>
								<div class="sidebar-side">
    								<div class="sidebar">
    								    <?php get_search_form() ?>
    								</div>
								</div>
							</div>
							
						<?php endif; ?>
                    </div>
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'naxly_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section> 
    <!--End blog area--> 
<?php
}
get_footer();

