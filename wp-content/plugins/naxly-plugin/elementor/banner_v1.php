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
class Banner_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_banner_v1';
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
		return esc_html__( 'Banner V1', 'naxly' );
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
			'banner_v1',
			[
				'label' => esc_html__( 'Banner V1', 'naxly' ),
			]
		);
		$this->add_control(
			'shape_image',
				[
				  'label' => __( 'Shape Image First', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'shape_image_2',
				[
				  'label' => __( 'Shape Image Second', 'diaco' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'elementor' ),
				'default'     => __( 'Learn More', 'elementor' ),
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
		$this->add_control(
			'btn_title_2',
			[
				'label'       => __( 'Button Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title Two', 'elementor' ),
				'default'     => __( 'Get Started', 'elementor' ),
			]
		);
		$this->add_control(
			'btn_link_2',
				[
				  'label' => __( 'Button Url Two', 'diaco' ),
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
              'banner_images', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'fields' => 
						[
                			[
                    			'name' => 'banner_img',
                    			'label' => esc_html__('Banner image', 'diaco'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Images Position', 'naxly' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Images Position One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Images Position One', 'naxly' ),
                					'two'  => esc_html__( 'Choose Images Position Two', 'naxly' ),
                					'three'  => esc_html__( 'Choose Images Position Three', 'naxly' ),
									'four' => esc_html__( 'Choose Images Position Four', 'naxly' ),
                					'five'  => esc_html__( 'Choose Images Position Five', 'naxly' ),
                					'six'  => esc_html__( 'Choose Images Position Six', 'naxly' ),
									'seven'  => esc_html__( 'Choose Images Position Seven', 'naxly' ),
                				),
                			],
                			
            			],
                 ]
        );
		$this->add_control(
            'rtl_style',
			[
				'label' => __( 'Choose RTL Style', 'diaco' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'SHow / Hide RTL Style', 'elementor' ),
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
        <section class="banner-section <?php if($settings['rtl_style']) echo 'home_rtl'; ?>">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(<?php echo $settings['shape_image']['url'];?>);"></div>
                <div class="pattern-2" style="background-image: url(<?php echo $settings['shape_image_2']['url'];?>);"></div>
            </div>
            <div class="icon-layer">
                <div class="icon icon-1 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/wheel-2.png);"></div>
                <div class="icon icon-2 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/wheel-3.png);"></div>
                <div class="icon icon-3 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/wheel-4.png);"></div>
                <div class="icon icon-4 rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/wheel-5.png);"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1>
                            <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="theme-btn style-two"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?><span><?php esc_html_e('+', 'naxly'); ?></span></a>
                                <a href="<?php echo esc_url( $settings['btn_link_2']['url'] );?>" class="theme-btn style-one"><?php echo wp_kses( $settings['btn_title_2'], $allowed_tags );?><span><?php esc_html_e('+', 'naxly'); ?></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="slider-image-1 clearfix">
                            <?php foreach($settings['banner_images'] as $service_block):?>
                            <figure class="image <?php if($service_block['style_two'] == 'two') echo 'image-2 float-bob-y'; elseif($service_block['style_two'] == 'three') echo 'image-3'; elseif($service_block['style_two'] == 'four') echo 'image-4'; elseif($service_block['style_two'] == 'five') echo 'image-5 float-bob-y'; elseif($service_block['style_two'] == 'six') echo 'image-6 float-bob-y'; elseif($service_block['style_two'] == 'seven') echo 'image-7'; else echo 'image-1'; ?>"><img src="<?php echo $service_block['banner_img']['url'];?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                            <?php endforeach;?>
                            <figure class="image image-8 wow bounceInDown" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dollar-1.png" alt=""></figure>
                            <figure class="image image-9 wow bounceInDown" data-wow-delay="200ms" data-wow-duration="1500ms"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dollar-2.png" alt=""></figure>
                            <figure class="image image-10 wow bounceInDown" data-wow-delay="400ms" data-wow-duration="1500ms"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dollar-3.png" alt=""></figure>
                            <figure class="image image-11 wow bounceInDown" data-wow-delay="600ms" data-wow-duration="1500ms"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dollar-4.png" alt=""></figure>
                            <figure class="image image-12 wow bounceInDown" data-wow-delay="800ms" data-wow-duration="1500ms"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dollar-5.png" alt=""></figure>
                            <figure class="image image-13"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrow-4.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->
           
		<?php 
	}

}
