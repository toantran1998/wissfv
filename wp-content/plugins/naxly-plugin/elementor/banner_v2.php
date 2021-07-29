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
class Banner_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_banner_v2';
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
		return esc_html__( 'Banner V2', 'naxly' );
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
			'banner_v2',
			[
				'label' => esc_html__( 'Banner V2', 'naxly' ),
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
				'default'     => __( 'More Details', 'elementor' ),
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
                					'one' => esc_html__( 'Choose Main Banner Image', 'naxly' ),
                					'two'  => esc_html__( 'Choose Gear Image Position one', 'naxly' ),
                					'three'  => esc_html__( 'Choose Gear Image Position Two', 'naxly' ),
									'four' => esc_html__( 'Choose Gear Image Position Three', 'naxly' ),
                					'five'  => esc_html__( 'Choose Gear Image Position Four', 'naxly' ),
                				),
                			],
                			
            			],
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
        <section class="banner-style-two">
            <div class="pattern-layer" style="background-image: url(<?php echo $settings['shape_image']['url'];?>);"></div>
            <div class="large-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h1><?php echo wp_kses( $settings['title'], true );?></h1>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                            <a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="theme-btn style-five"><i class="flaticon-next"></i><?php echo wp_kses( $settings['btn_title'], true );?></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <?php foreach($settings['banner_images'] as $service_block):?>
                            <figure class="image <?php if($service_block['style_two'] == 'two') echo 'image-2 rotate-me'; elseif($service_block['style_two'] == 'three') echo 'image-3 rotate-me'; elseif($service_block['style_two'] == 'four') echo 'image-4 rotate-me'; elseif($service_block['style_two'] == 'five') echo 'image-5 rotate-me'; else echo 'image-1'; ?>"><img src="<?php echo $service_block['banner_img']['url'];?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                            <?php endforeach;?>
                            <div class="anim-icon">
                                <span class="icon icon-1"></span>
                                <span class="icon icon-2"></span>
                                <span class="icon icon-3"></span>
                                <span class="icon icon-4"></span>
                                <span class="icon icon-5"></span>
                                <span class="icon icon-6"></span>
                                <span class="icon icon-7"></span>
                                <span class="icon icon-8"></span>
                                <span class="icon icon-9"></span>
                                <span class="icon icon-10"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->
           
		<?php 
	}

}
