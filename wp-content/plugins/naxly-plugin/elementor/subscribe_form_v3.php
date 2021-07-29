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
class Subscribe_Form_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_subscribe_form_v3';
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
		return esc_html__( 'Subscribe Form V3', 'naxly' );
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
			'subscribe_form_v3',
			[
				'label' => esc_html__( 'Subscribe Form V3', 'naxly' ),
			]
		);
		$this->add_control(
			'shape_image',
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
				'placeholder' => __( 'Enter your Sub title', 'elementor' ),
				'default'     => __( 'Subscribe Us', 'elementor' ),
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
				'default'     => __( 'Join with our global community', 'elementor' ),
			]
		);
		$this->add_control(
              'form_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Exclusive Offers & Discount', 'diaco')],
                			['title1' => esc_html__('Expert Advice & Tutorial', 'diaco')],
                			['title1' => esc_html__('Regular Updates in Inbox', 'diaco')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Title Here', 'diaco')
                			],
							[
                    			'name' => 'link',
								'label' => __( 'External Url', 'diaco' ),
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
			'form_id',
			[
				'label'       => __( 'Feedburner ID', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feedburner ID', 'elementor' ),
				'default'     => __( 'themeforest', 'elementor' ),
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
        
        <!-- subscribe-section -->
        <section class="subscribe-section style-two">
            <div class="pattern-layer" style="background-image: url(<?php echo $settings['shape_image']['url'];?>);"></div>
            <div class="auto-container">
                <div class="sec-title text-center">
                    <p><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></p>
                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-6.png);"></div>
                </div>
                <div class="inner-box text-center">
                    <ul class="link-box clearfix">
                        <?php foreach($settings['form_info'] as $item):?>
                        <li><a href="<?php echo esc_url( $item['link']['url'] );?>"><i class="flaticon-next"></i><?php echo wp_kses($item['title1'], $allowed_tags);?></a></li>
                        <?php endforeach;?>
                    </ul>
                    <div class="subscribe-form">
                        <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post">
                            <div class="form-group">
                                <input type="hidden" id="uri7" name="uri" value="<?php echo wp_kses($setting['form_id'], $allowed_tags); ?>">
                                <input type="email" name="email" placeholder="<?php esc_html_e('Your Email Address...', 'naxly'); ?>" required="">
                                <button type="submit" class="theme-btn style-nine"><i class="flaticon-next"></i></button>
                            </div>
                            <div class="form-group">
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description"><?php esc_html_e('accept naxly private policy', 'naxly'); ?></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->
          
		<?php 
	}

}
