<?php

namespace NAXLYPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Our_Team_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_our_team_v2';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Our Team V2', 'naxly' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'naxly' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'our_team_v2',
			[
				'label' => esc_html__( 'Our Team V2', 'naxly' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Shape Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'elementor' ),
				'default'     => __( 'Team Members', 'elementor' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default'     => __( '', 'elementor' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'naxly' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'naxly' ),
					'title'      => esc_html__( 'Title', 'naxly' ),
					'menu_order' => esc_html__( 'Menu Order', 'naxly' ),
					'rand'       => esc_html__( 'Random', 'naxly' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'naxly' ),
					'ASC'  => esc_html__( 'ASC', 'naxly' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'naxly' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'naxly' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'naxly'),
				  'options' => get_team_categories()
				]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'elementor' ),
				'default'     => __( 'All Members', 'elementor' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'diaco' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
				
			   ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = naxly_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-naxly' );
		$args = array(
			'post_type'      => 'naxly_team',
			'posts_per_page' => naxly_set( $settings, 'query_number' ),
			'orderby'        => naxly_set( $settings, 'query_orderby' ),
			'order'          => naxly_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( naxly_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = naxly_set( $settings, 'query_exclude' );
		}
		
		if( naxly_set( $settings, 'query_category' ) ) $args['team_cat'] = naxly_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- team-style-two -->
        <section class="team-style-two bg-color-1" id="team">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['bg_img']['url']);?>);"></div>
            <div class="auto-container">
               <?php if($settings['subtitle'] || $settings['title']): ?>
                <div class="sec-title text-center mb-60">
                    <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                </div>
                <?php endif; ?>
                <div class="row clearfix">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                        <div class="team-block-two wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <?php the_post_thumbnail('naxly_140x140'); ?>
                                    <ul class="contact-box clearfix">
                                        <li class="email">
                                            <a href="mailto:<?php echo esc_url(get_post_meta( get_the_id(), 'email_address', true ));?>">
                                                <i class="flaticon-gmail"></i>
                                                <span><?php echo (get_post_meta( get_the_id(), 'email_address', true ));?></span>
                                            </a>
                                        </li>
                                        <?php
											$icons = get_post_meta( get_the_id(), 'social_profile', true );
											if ( ! empty( $icons ) ) :
										?>
                                        <li class="social-links">
                                            <a href="javascript:void(0)" class="share"><i class="flaticon-share-1"></i></a>
                                            <ul class="list clearfix">
                                                <?php
												foreach ( $icons as $h_icon ) :
													$header_social_icons = json_decode( urldecode( naxly_set( $h_icon, 'data' ) ) );
													if ( naxly_set( $header_social_icons, 'enable' ) == '' ) {
														continue;
													}
													$icon_class = explode( '-', naxly_set( $header_social_icons, 'icon' ) );
													?>
													<li><a href="<?php echo naxly_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo naxly_set( $header_social_icons, 'background' ); ?>; color: <?php echo naxly_set( $header_social_icons, 'color' ); ?>"><i class="fab <?php echo esc_attr( naxly_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
												<?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true));?>"><?php the_title(); ?></a></h4>
                                    <span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if($settings['btn_link']['url']): ?>
                <div class="more-btn"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn style-ten"><?php echo wp_kses($settings['btn_title'], $allowed_tags);?></a></div>
            	<?php endif; ?>
            </div>
        </section>
        <!-- team-style-two end -->	
         
        <?php }
		wp_reset_postdata();
	}

}
