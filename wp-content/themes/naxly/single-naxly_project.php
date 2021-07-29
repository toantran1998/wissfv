<?php get_header(); 
$data    = \NAXLY\Includes\Classes\Common::instance()->data( 'single-naxly_project' )->get();
?>

<?php while( have_posts() ) : the_post(); 
	$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
	$client_image = get_post_meta( get_the_id(), 'client_image', true );
?>


<!--Page Title-->
<section class="page-title text-center style-two">
    <div class="pattern-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-62.png);"></div>
    <div class="auto-container">
        <div class="content-box">
            <figure class="icon-box"><img src="<?php echo esc_url($client_image['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
            <h3><?php echo (get_post_meta( get_the_id(), 'client_name', true ));?></h3>
            <h2><?php the_title(); ?></h2>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- project-details -->
<section class="project-details">
    <div class="upper-box">
        <div class="auto-container">
            <div class="row clearfix">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="nav-btn-box">
        <div class="auto-container">
            <div class="btn-inner clearfix">
                <?php global $post; $prev_post = get_previous_post();
					if (!empty($prev_post)):
				?>
                <div class="btn-left pull-left">
                    <div class="prev-btn">
                        <h4><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fas fa-angle-double-left"></i>&nbsp;<?php esc_html_e('Prev Project', 'naxly'); ?></a></h4>
                    </div>
                    <div class="box">
                        <figure class="icon-box"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-8.png" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                        <span><?php echo implode( ', ', (array)$term_list );?></span>
                        <h3><?php echo wp_kses(naxly_trim( get_the_title($prev_post->ID), 3 ), true); ?></h3>
                    </div>
                </div>
                <?php endif; ?>
            
				<?php global $post; $next_post = get_next_post();
                    if (!empty($next_post)): 
                ?>
                <div class="btn-right pull-right text-right">
                    <div class="prev-btn">
                        <h4><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next Project', 'naxly'); ?>&nbsp;<i class="fas fa-angle-double-right"></i></a></h4>
                    </div>
                    <div class="box">
                        <figure class="icon-box"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-9.png" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                        <span><?php echo implode( ', ', (array)$term_list );?></span>
                        <h3><?php echo wp_kses(naxly_trim( get_the_title($prev_post->ID), 3 ), true); ?></h3>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- project-details end -->

<?php endwhile; ?>

<?php get_footer(); ?>