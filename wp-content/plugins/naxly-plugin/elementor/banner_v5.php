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
class Banner_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_banner_v5';
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
		return esc_html__( 'Banner V5', 'naxly' );
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
			'banner_v5',
			[
				'label' => esc_html__( 'Banner V5', 'naxly' ),
			]
		);
		$this->add_control(
			'banner_image',
				[
				  'label' => __( 'Banner Image First', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'banner_image_2',
				[
				  'label' => __( 'Banner Image Second', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'elementor' ),
			]
		);
		$this->add_control(
			'video_url',
				[
				  'label' => __( 'Video Url', 'diaco' ),
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
		$this->add_control(
			'video_title',
			[
				'label'       => __( 'Video Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Video Title', 'elementor' ),
				'default'     => __( 'Contact Our Team', 'elementor' ),
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
		?>
        <!-- banner-section -->
        <section class="banner-style-five" id="home">
            <div class="anim-icon">
                <span class="icon icon-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-13.png);"></span>
                <span class="icon icon-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-13.png);"></span>
                <span class="icon icon-3 bg-color"></span>
                <span class="icon icon-4 bg-color"></span>
                <span class="icon icon-5 bg-color"></span>
                <span class="icon icon-6" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-13.png);"></span>
                <span class="icon icon-7 bg-color"></span>
                <span class="icon icon-8 bg-color"></span>
                <span class="icon icon-9" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/anim-icon-14.png);"></span>
                <span class="icon icon-10" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/cloud-1.png);"></span>
                <span class="icon icon-11" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/cloud-2.png);"></span>
            </div>
            <div class="pattern-layer">
                <div class="pattern pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-32.png);"></div>
                <div class="pattern pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-33.png);"></div>
                <div class="pattern pattern-3" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-34.png);"></div>
                <div class="pattern pattern-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-35.png);"></div>
                <div class="pattern pattern-5" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-36.png);"></div>
            </div>
            <div class="image-layer">
                <figure class="image-1 float-bob-y"><img src="<?php echo esc_url($settings['banner_image']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                <figure class="image-2 wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo esc_url($settings['banner_image_2']['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
            </div>
            <div class="auto-container">
                <div class="row clearfix align-items-center">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                        <div class="content-box">
                            <h1><?php echo wp_kses($settings['title'], $allowed_tags); ?></h1>
                            <p><?php echo wp_kses($settings['text'], $allowed_tags); ?></p>
                            <a href="<?php echo esc_url($settings['video_url']['url']); ?>" class="lightbox-image" data-caption=""><i class="flaticon-play-button"></i><span class="flaticon-next"></span><?php echo wp_kses($settings['video_title'], $allowed_tags);?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->
           
		<?php 
	}

}
