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
class Service_Detail_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_service_detail_v1';
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
		return esc_html__( 'Service Detail V1', 'naxly' );
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
			'service_detail_v1',
			[
				'label' => esc_html__( 'Service Detail V1', 'naxly' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => naxly_get_sidebars(),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'elementor' ),
				'default'     => __( 'Start Your Project', 'elementor' ),
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
			'service_img',
				[
				  'label' => __( 'Service Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'title1',
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
			'text1',
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
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['ser_title' => esc_html__('Stream Analytics', 'diaco')],
                			['ser_title' => esc_html__('Operational Anaytics', 'diaco')],
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
                    			'name' => 'sub_title',
                    			'label' => esc_html__('Sub Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Sub Title Here', 'diaco')
                			],
							[
                    			'name' => 'ser_title',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'ser_text',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
							[
                    			'name' => 'btn_title1',
                    			'label' => esc_html__('Button Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'diaco')
                			],
							[
                    			'name' => 'btn_link1',
								'label' => __( 'Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{ser_title}}',
                 ]
        );
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Technologies that we use', 'elementor' ),
			]
		);
		$this->add_control(
			'text2',
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
			'feature_str',
			[
				'label'       => __( 'Feature List', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Feature List', 'elementor' ),
			]
		);
		$this->add_control(
              'services_box', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['box_title' => esc_html__('Python', 'diaco')],
                			['box_title' => esc_html__('Algorithm', 'diaco')],
							['box_title' => esc_html__('Big Data', 'diaco')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons_2',
								'label' => esc_html__('Enter The icons', 'diaco'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'box_title',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
						],
            	    'title_field' => '{{box_title}}',
                 ]
        );
		$this->add_control(
			'service_img2',
				[
				  'label' => __( 'Graph Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'title3',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Application areas', 'elementor' ),
			]
		);
		$this->add_control(
			'text3',
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
              'application_areas', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['box_title2' => esc_html__('Trasportation', 'diaco')],
                			['box_title2' => esc_html__('Travel', 'diaco')],
							['box_title2' => esc_html__('Finance', 'diaco')],
							['box_title2' => esc_html__('Marketing', 'diaco')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons_3',
								'label' => esc_html__('Enter The icons', 'diaco'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'box_title2',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
						],
            	    'title_field' => '{{box_title2}}',
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
        
        <!-- service-details -->
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <div class="inner-box">
                                
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 left-column">
                                            <div class="title-box">
                                                <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                                                <a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="btn-style-four"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?><span><?php esc_html_e('+', 'naxly'); ?></span></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 right-column">
                                            <div class="text">
                                                <?php echo wp_kses( $settings['text'], $allowed_tags );?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <figure class="single-image"><img src="<?php echo esc_url( $settings['service_img']['url'] );?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                                
                                <div class="carousel-box">
                                    <div class="top-box">
                                        <h3><?php echo wp_kses( $settings['title1'], $allowed_tags );?></h3>
                                        <p><?php echo wp_kses( $settings['text1'], $allowed_tags );?></p>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="two-column-carousel-2 owl-carousel owl-theme owl-nav-none">
                                            <?php foreach($settings['services'] as $key => $service_block):?>
                                            <div class="single-item">
                                                <div class="box">
                                                    <div class="icon-box"><i class="<?php echo esc_attr($service_block['icons']);?>"></i></div>
                                                    <span><?php echo wp_kses($service_block['sub_title'], $allowed_tags);?></span>
                                                    <h4><?php echo wp_kses($service_block['ser_title'], $allowed_tags);?></h4>
                                                </div>
                                                <div class="inner">
                                                    <p><?php echo wp_kses($service_block['ser_text'], $allowed_tags);?></p>
                                                    <a href="<?php echo esc_url($service_block['btn_link1']['url']);?>" class="btn-style-four"><?php echo wp_kses($service_block['btn_title1'], $allowed_tags);?><span><?php esc_html_e('+', 'naxly'); ?></span></a>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="technology-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                                            <div class="content-box">
                                                <h3><?php echo wp_kses( $settings['title2'], $allowed_tags );?></h3>
                                                <p><?php echo wp_kses( $settings['text2'], $allowed_tags );?></p>
                                                <ul class="list-item clearfix">
                                                    <?php $fearures = explode("\n", ($settings['feature_str']));?>
													<?php foreach($fearures as $feature):?>
                                                    <li><span class="dote"></span><?php echo wp_kses($feature, true); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 icon-column">
                                            <div class="icon-box">
                                                <?php $count = 1; foreach($settings['services_box'] as $key => $item):?>
                                                <div class="icon icon-<?php echo esc_attr($count); ?>">
                                                    <i class="<?php echo esc_attr($item['icons_2']);?>"></i>
                                                    <h4><?php echo wp_kses($item['box_title'], $allowed_tags);?></h4>
                                                </div>
                                                <?php $count++; endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-image"><a href="<?php echo esc_url( $settings['service_img2']['url'] );?>" class="lightbox-image"><img src="<?php echo esc_url( $settings['service_img2']['url'] );?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
                               
                                <div class="application-box">
                                    <h3><?php echo wp_kses( $settings['title3'], $allowed_tags );?></h3>
                                    <p><?php echo wp_kses( $settings['text3'], $allowed_tags );?></p>
                                    <div class="inner clearfix">
                                        <?php $count = 1; foreach($settings['application_areas'] as $key => $items):?>
                                        <div class="single-item">
                                            <div class="box">
                                                <i class="<?php echo esc_attr($items['icons_3']);?>"></i>
                                                <h4><?php echo wp_kses($items['box_title2'], $allowed_tags);?></h4>
                                            </div>
                                        </div>
                                        <?php $count++; endforeach;?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar">
                            <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
								<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->
          
		<?php 
	}

}