<?php
/**
 * Blog Post Main File.
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \NAXLY\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
$options = naxly_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>

<!--Page Title-->
<section class="page-title text-center style-two">
    <div class="pattern-layer" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="file-box"><i class="far fa-folder-open"></i><p><?php the_category(' '); ?></p></div>
            <h2><?php the_title(); ?></h2>
            <?php if( $options->get( 'single_post_author' ) || $options->get( 'single_post_date' ) || $options->get( 'single_post_comments' ) ):?>
            <ul class="info-box clearfix">
                <?php if( $options->get( 'single_post_author' ) ):?>
                <li><i class="far fa-user"></i><span><?php esc_html_e('Author:', 'naxly'); ?></span> <?php the_author(); ?></li>
                <?php endif; ?>
                
				<?php if( $options->get( 'single_post_date' ) ):?>
                <li><i class="far fa-calendar-alt"></i><span><?php esc_html_e('Posted On:', 'naxly'); ?></span> <?php echo get_the_date(); ?></li>
				<?php endif; ?>
                
                <?php if( $options->get( 'single_post_comments' ) ):?>
                <li><i class="far fa-comment-alt"></i><span><?php esc_html_e('Post Comments:', 'naxly'); ?></span> <?php comments_number( wp_kses(__('0' , 'naxly'), true), wp_kses(__('1' , 'naxly'), true), wp_kses(__('%' , 'naxly'), true)); ?></li>
                <?php endif; ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Start blog area-->
<section class="sidebar-page-container blog-details">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'naxly_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-details-content">
                	
                    <div class="thm-unit-test">    
                    
                        <div <?php post_class('blog-post'); ?>>    
                            
                            <div class="inner-box text m-b0">
                                <?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'naxly'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            </div>
                            <?php if( has_tag() ):?>
                            <div class="post-share-option m-t54">
                                
                                <div class="post-tags">
                                    <ul class="tags-list clearfix">
                                        <li><i class="fas fa-tags"></i><h5><?php esc_html_e('Tags:', 'naxly'); ?></h5></li>
										<?php the_tags( '<li>', '</li><li> ', '</li>' ); ?>
                                    </ul>
                                </div>
                                
                                <?php if(function_exists('bunch_share_us')):?>
                                <div class="post-social">
                                    <h5><?php esc_html_e('Share this post with your friends', 'naxly');?></h5>
                                    
                                    <?php echo wp_kses(bunch_share_us(get_the_id(),$post->post_name ), true);?>
                                </div>
                                <?php endif;?>
                            </div>
                            <?php endif; ?>
                            <?php if( $options->get( 'single_post_author_box' ) ):?>
                            <div class="author-box">
                                <figure class="author-image">
                                	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
										<?php echo get_avatar(get_the_author_meta('ID'), 85); ?>
                                    <?php endif; ?>
                                </figure>
                                <div class="inner">
                                    <div class="author-info">
                                        <h4><?php the_author(); ?></h4>
                                        <p><?php esc_html_e('Visit:', 'naxly'); ?> <a href="<?php the_author_meta( 'url', get_the_author_meta('ID') ); ?>"><?php the_author_meta( 'url', get_the_author_meta('ID') ); ?></a></p>
                                    </div>
                                    <div class="text">
                                        <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                    </div>
                                    <?php if( $options->get( 'single_post_author_links' ) ):?>
                                    <div class="share">
                                        <a href="javascript(0):;" class="share-btn"><i class="flaticon-share"></i></a>
                                        <?php $icons = $options->get( 'single_post_author_social_share' );
											if ( ! empty( $icons ) ) :
											?>
											<ul class="social-links clearfix">
												<?php
												foreach ( $icons as $h_icon ) :
													$header_social_icons = json_decode( urldecode( naxly_set( $h_icon, 'data' ) ) );
													if ( naxly_set( $header_social_icons, 'enable' ) == '' ) {
														continue;
													}
													$icon_class = explode( '-', naxly_set( $header_social_icons, 'icon' ) );
													?>
													<li><a href="<?php echo esc_url(naxly_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(naxly_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(naxly_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( naxly_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!--End Single blog Post-->
                            <?php comments_template(); ?>
                        
                    	</div>
                        
                	</div>
				
                </div>
				<?php endwhile; ?>
                
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

<?php if((get_previous_post()) || (get_next_post())): ?>
<!-- nav-btn -->
<div class="nav-btn-box style-two">
    <div class="auto-container">
        <div class="btn-inner clearfix">
            <?php global $post; $prev_post = get_previous_post();
                if (!empty($prev_post)):
            ?>
            <div class="btn-left pull-left">
                <div class="prev-btn">
                    <h4><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fas fa-angle-double-left"></i>&nbsp;<?php esc_html_e('Prev Post', 'naxly'); ?></a></h4>
                </div>
                <div class="box">
                    <div class="post-date"><p><?php echo get_the_date('d'); ?></p><span><?php echo get_the_date('M'); ?></span></div>
                    <div class="file-box"><i class="far fa-folder-open"></i>&nbsp;&nbsp;<p><?php the_category(' '); ?></p></div>
                    <h4><?php echo wp_kses(naxly_trim( get_the_title($prev_post->ID), 6 ), true); ?></h4>
                </div>
            </div>
            <?php endif; ?>
            
            <?php global $post; $next_post = get_next_post();
                if (!empty($next_post)): 
            ?>
            <div class="btn-right pull-right text-right">
                <div class="prev-btn">
                    <h4><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next Post', 'naxly'); ?>&nbsp;<i class="fas fa-angle-double-right"></i></a></h4>
                </div>
                <div class="box">
                    <div class="post-date"><p><?php echo get_the_date('d'); ?></p><span><?php echo get_the_date('M'); ?></span></div>
                    <div class="file-box"><p><?php the_category(' '); ?></p>&nbsp;&nbsp;<i class="far fa-folder-open"></i></div>
                    <h4><?php echo wp_kses(naxly_trim( get_the_title($next_post->ID), 6 ), true); ?></h4>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- nav-btn end -->
<?php endif; ?>

<?php
}
get_footer();
