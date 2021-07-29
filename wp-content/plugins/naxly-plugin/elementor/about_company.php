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
class About_Company extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_about_company';
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
		return esc_html__( 'About Company', 'naxly' );
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
			'about_company',
			[
				'label' => esc_html__( 'About Company', 'naxly' ),
			]
		);
		$this->add_control(
              'about_tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['btn_title' => esc_html__('Our Mission', 'diaco')],
                			['btn_title' => esc_html__('Our Vison', 'diaco')],
                			['btn_title' => esc_html__('Core Values', 'diaco')]
            			],
            		'fields' => 
						[
                			
							[
							  'name' => 'image',
							  'label' => __( 'Image', 'diaco' ),
							  'type' => Controls_Manager::MEDIA,
							  'default' => ['url' => Utils::get_placeholder_image_src(),],
							  
							],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Tab Button Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('About Company', 'diaco')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Feature List', 'diaco')
                			],
							[
                    			'name' => 'video_link',
								'label' => __( 'Video Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{btn_title}}',
                 ]
        );
		$this->add_control(
            'style_two',
			[
				'label'   => esc_html__( 'Choose Spacing Isuess', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Spacing Style',
				'options' => array(
					'one' => esc_html__( 'Choose Spacing Style One', 'naxly' ),
					'two'  => esc_html__( 'Choose Spacing Style Two', 'naxly' ),
					'three'  => esc_html__( 'Choose RTL Style', 'naxly' ),
				),
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
        	
        <!-- about-section -->
        <section class="about-section <?php if($settings['style_two'] == 'two') echo 'sec-pad'; elseif($settings['style_two'] == 'three') echo 'home_rtl'; else echo '' ; ?>">
            <div class="auto-container">
                <div class="tabs-box">
                    <div class="tabs-content" id="content_block_01">
                        <?php foreach($settings['about_tabs'] as $key => $service_block):?>
                        <div class="tab <?php if($key == 1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($key); ?>">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="sec-title text-left">
                                            <p><?php echo wp_kses($service_block['subtitle'], $allowed_tags);?></p>
                                            <h2><?php echo wp_kses($service_block['title'], $allowed_tags);?></h2>
                                            <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                                        </div>
                                        <div class="text">
                                            <p><?php echo wp_kses($service_block['text'], $allowed_tags);?></p>
                                        </div>
                                        <ul class="list-item clearfix">
                                            <?php $fearures = explode("\n", ($service_block['feature_str']));?>
											<?php foreach($fearures as $feature):?>
                                            <li><span class="dots"></span><?php echo wp_kses($feature, true); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 inner-column">
                                    <div class="inner-box">
                                        <div class="video-inner" style="background-image: url(<?php echo esc_url($service_block['image']['url']);?>);">
                                            <a href="<?php echo esc_url($service_block['video_link']['url']);?>" class="lightbox-image" data-caption=""><i class="flaticon-play-button"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <?php foreach($settings['about_tabs'] as $keys => $service_block ):?>
                            <li class="tab-btn <?php if($keys == 1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($keys); ?>"><h4><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></h4></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->
           
		<?php 
	}

}
