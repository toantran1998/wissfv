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
class Why_Choose_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_why_choose_us';
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
		return esc_html__( 'Why Choose Us', 'naxly' );
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
			'why_choose_us',
			[
				'label' => esc_html__( 'Why Choose Us', 'naxly' ),
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
				'placeholder' => __( 'Enter your Sub Title', 'elementor' ),
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
              'services', 
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
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Post Style', 'naxly' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Text Left Align',
                				'options' => array(
                					'one' => esc_html__( 'Choose Text Left Align', 'naxly' ),
                					'two'  => esc_html__( 'Choose Text Right Align', 'naxly' ),
                				),
                			],
            			],
            	    'title_field' => '{{title1}}',
                 ]
        );
		$this->add_control(
			'video_img',
				[
				  'label' => __( 'Video Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'shape_img',
				[
				  'label' => __( 'Shape Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'video_link',
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
        	
        <!-- chooseus-section -->
        <section class="chooseus-section <?php if($settings['rtl_style']) echo 'home_rtl'; ?> ">
            <div class="auto-container">
                <div class="sec-title text-center style-two">
                    <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div id="content_block_04">
                            <div class="content-box">
                                <?php $count = 1; foreach($settings['services'] as $key => $item):?>
                                <div class="single-item <?php if($item['style_two'] == 'two') echo 'text-right'; else echo ''; ?>">
                                    <div class="icon-box">
                                        <div class="bg-layer" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bg-4.png);"></div>
                                        <i class="<?php echo esc_attr($item['icons']);?>"></i>
                                    </div>
                                    <div class="box">
                                        <h4><?php echo wp_kses($item['title1'], $allowed_tags);?></h4>
                                        <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                                        <a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php if($item['style_two'] == 'two') echo 'Read More <i class="fas fa-arrow-left"></i>'; else echo '<i class="fas fa-arrow-right"></i> Read More'; ?></a>
                                    </div>
                                </div>
                                <?php $count++; endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                        <div id="video_block_01">
                            <div class="video-inner wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url(<?php echo esc_url($settings['video_img']['url']);?>);">
                                <?php if($settings['shape_img']['url']): ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['shape_img']['url']);?>);"></div><?php endif;?>
                                <div class="video-btn">
                                    <div class="btn-bg rotate-me" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bg-5.png);"></div>
                                    <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="lightbox-image" data-caption=""><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->
         
        
		<?php 
	}

}
