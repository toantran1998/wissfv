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
class Comming_Soon extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_comming_soon';
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
		return esc_html__( 'Comming Soon', 'naxly' );
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
			'comming_soon',
			[
				'label' => esc_html__( 'Comming Soon', 'naxly' ),
			]
		);
		$this->add_control(
			'feature_image',
				[
				  'label' => __( 'Feature Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'shape_image',
				[
				  'label' => __( 'Shape Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'logo_image',
				[
				  'label' => __( 'Logo Image', 'diaco' ),
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
			'countdown_date',
			[
				'label'       => __( 'Date And Time', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Date and Time', 'elementor' ),
				'default' => esc_html__('04/24/2021 05:06:59', 'elementor')
			]
		);
		$this->add_control(
			'form_id',
			[
				'label'       => __( 'Form Url', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Url', 'elementor' ),
			]
		);
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['icons' => esc_html__('Facebook', 'diaco')],
							['icons' => esc_html__('Twitter', 'diaco')],
							['icons' => esc_html__('Linkedin', 'diaco')],
							['icons' => esc_html__('instagram', 'diaco')],
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
                    			'name' => 'link',
								'label' => __( 'External Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{icons}}',
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
        
        <!-- coming-soon -->
        <section class="coming-soon">
            <div class="image-layer" style="background-image: url(<?php echo $settings['feature_image']['url'];?>);"></div>
            <div class="pattern-layer" style="background-image: url(<?php echo $settings['shape_image']['url'];?>);"></div>
            <div class="outer-conainer clearfix">
                <div class="inner-box">
                    <div class="content-box">
                        <div class="upper-box">
                            <figure class="logo-box"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $settings['logo_image']['url'];?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                        </div>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="<?php echo wp_kses( $settings['countdown_date'], true );?>"></div>
                        </div>
                        <div class="lower-box">
                            <form action="contact.html" method="post" class="subscribe-form">
                                <div class="form-group clearfix">
                                    <input type="email" name="email" placeholder="Email Address..." required="">
                                    <button type="submit" class="theme-btn style-one">Subscribe Us</button>
                                </div>
                            </form>
                            <ul class="social-links clearfix">
                                <?php foreach($settings['social_icons'] as $keys => $service_block ):?>
                                <li><a href="<?php echo esc_url($service_block['link']['url']);?>"><i class="fab <?php echo esc_attr($service_block['icons']);?>"></i></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coming-soon end -->	
          
		<?php 
	}

}
