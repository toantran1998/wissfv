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
class Why_Choose_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_why_choose_us_v2';
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
		return esc_html__( 'Why Choose Us V2', 'naxly' );
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
			'why_choose_us_v2',
			[
				'label' => esc_html__( 'Why Choose Us V2', 'naxly' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Image', 'diaco' ),
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
			'text',
			[
				'label'       => __( 'Text/Description', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'elementor' ),
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
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'diaco'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'placeholder' => __( 'Enter your Title', 'elementor' ),
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'placeholder' => __( 'Enter your Text', 'elementor' ),
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
        	
        <!-- chooseus-style-two -->
        <section class="chooseus-style-two bg-color-3">
            <div class="bg-layer" style="background-image: url(<?php echo esc_url($settings['bg_img']['url']);?>);"></div>
            <div class="auto-container">
                <?php if($settings['subtitle'] || $settings['title']): ?>
                <div class="title-inner mb-35 clearfix">
                    <div class="sec-title light text-left pull-left">
                        <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                        <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                        <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-5.png);"></div>
                    </div>
                    <div class="text pull-right">
                        <p><?php echo wp_kses($settings['text'], $allowed_tags);?></p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row clearfix">
                    <?php foreach($settings['services'] as $key => $item):?>
                    <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                        <div class="single-item wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><?php echo wp_kses($item['title1'], $allowed_tags);?></h4>
                                <div class="box">
                                    <div class="icon-box"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                    <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- chooseus-style-two end -->
       
		<?php 
	}

}
