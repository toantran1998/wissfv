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
class Why_Choose_Us_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_why_choose_us_v3';
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
		return esc_html__( 'Why Choose Us V3', 'naxly' );
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
			'why_choose_us_v3',
			[
				'label' => esc_html__( 'Why Choose Us V3', 'naxly' ),
			]
		);
		$this->add_control(
			'shape_img',
				[
				  'label' => __( 'Background Shape Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'feature_img',
				[
				  'label' => __( 'Feature Image', 'diaco' ),
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
				'placeholder' => __( 'Why Choose Us', 'elementor' ),
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
				'placeholder' => __( 'Reason for choosing', 'elementor' ),
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
							['title1' => esc_html__('High-Quality Results', 'diaco')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'diaco'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
						],
            	    'title_field' => '{{title1}}',
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
        	
        <!-- chooseus-style-three -->
        <section class="chooseus-style-three">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['shape_img']['url']);?>);"></div>
            <figure class="image-layer js-tilt"><img src="<?php echo esc_url($settings['feature_img']['url']);?>" alt="<?php esc_html_e('Awesome Image', 'naxly'); ?>"></figure>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-xl-4 col-lg-6 col-md-12 inner-column">
                            <div class="inner-box">
                                <div class="sec-title text-left">
                                    <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                                </div>
                                <?php $count = 0; foreach($settings['services'] as $key => $item):
									if(($count%1) == 0 && $count != 0):
								?>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-md-12 inner-column">
                            <div class="inner-box">
								<?php endif; ?>
								<div class="single-item">
                                    <h3><?php echo wp_kses($item['title1'], $allowed_tags);?></h3>
                                    <div class="box">
                                        <div class="icon-box"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                        <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                                    </div>
                                </div>
                                <?php $count++; endforeach;?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-style-three end -->
        
		<?php 
	}

}
