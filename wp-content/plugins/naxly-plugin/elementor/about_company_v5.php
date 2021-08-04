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
class About_Company_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_about_company_v5';
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
		return esc_html__( 'About Company V5', 'naxly' );
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
			'about_company_v5',
			[
				'label' => esc_html__( 'About Company V5', 'naxly' ),
			]
		);
		$this->add_control(
			'about_image',
				[
				  'label' => __( 'About Image', 'diaco' ),
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
				'placeholder' => __( 'Enter your title', 'elementor' ),
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
              'about_tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Global Experience', 'diaco')],
                			['title1' => esc_html__('Value for Results', 'diaco')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons',
								'label' => esc_html__('Enter The icons', 'diaco'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
							[
                    			'name' => 'link',
								'label' => __( 'Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{title1}}',
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
				'default'     => __( 'Read More', 'elementor' ),
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
            'style_two',
			[
				'label' => __( 'Choose Different Background Style', 'diaco' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Choose Different Background Style', 'elementor' ),
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
        
        <!-- about-style-five -->
        <section class="about-style-five bg-color-1" id="about">
            <?php if( !$settings['style_two'] ) : ?>
            <div class="pattern-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-38.png);"></div>
            <div class="icon-layer">
                <figure class="icon icon-1 rotate-me"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gear-1.png" alt=""></figure>
                <figure class="icon icon-2 rotate-me"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gear-2.png" alt=""></figure>
                <figure class="icon icon-3 rotate-me"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gear-3.png" alt=""></figure>
            </div>
            <?php endif; ?>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div id="content_block_10">
                            <div class="content-box">
                                <div class="sec-title text-left">
                                    <p><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></p>
                                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                                </div>
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <?php foreach($settings['about_tabs'] as $key => $service_block):?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><i class="<?php echo esc_attr($service_block['icons']);?>"></i></div>
                                                <h3><a href="<?php echo esc_url($service_block['link']['url']);?>"><?php echo wp_kses($service_block['title1'], $allowed_tags);?></a></h3>
                                                <p><?php echo wp_kses($service_block['text1'], $allowed_tags);?></p>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="btn-box"><a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="theme-btn style-ten"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div id="image_block_04">
                            <div class="image-box wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <figure class="image js-tilt"><img src="<?php echo esc_url( $settings['about_image']['url'] );?>" alt="<?php esc_attr_e('Awesome Image', 'naxly')?>"></figure>
                                <div class="pattern-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/shape-37.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-five end -->	
           
		<?php 
	}

}