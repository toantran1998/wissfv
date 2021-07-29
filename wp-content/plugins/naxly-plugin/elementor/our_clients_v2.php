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
class Our_Clients_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_our_clients_v2';
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
		return esc_html__( 'Our Clients V2', 'naxly' );
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
			'our_clients_v2',
			[
				'label' => esc_html__( 'Our Clients V2', 'naxly' ),
			]
		);
		$this->add_control(
			'bg_shape_image',
				[
				  'label' => __( 'Background Pattern Image First', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'bg_shape_image_2',
				[
				  'label' => __( 'Background Pattern Image Second', 'diaco' ),
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
				'placeholder' => __( 'Enter your Title', 'elementor' ),
			]
		);
		$this->add_control(
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'fields' => 
						[
                			[
                    			'name' => 'client_img',
                    			'label' => esc_html__('Client image', 'diaco'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'client_link',
								'label' => __( 'External Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
        	
        <!-- clients-style-two -->
        <section class="clients-style-two bg-color-1">
            <div class="pattern-layer">
                <?php if( $settings['bg_shape_image']['url'] ): ?><div class="pattern-1" style="background-image: url(<?php echo esc_url( $settings['bg_shape_image']['url'] );?>);"></div><?php endif; ?>
                <?php if( $settings['bg_shape_image_2']['url'] ): ?><div class="pattern-2 wow slideInRight" data-wow-delay="00ms" data-wow-duration="1500ms" style="background-image: url(<?php echo esc_url($settings['bg_shape_image_2']['url'] );?>);"></div><?php endif; ?>
            </div>
            <div class="auto-container">
                <div class="sec-title text-center style-two mb-70">
                    <p><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></p>
                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                </div>
                <div class="logo-inner">
                    <ul class="logo-box logo-box-one clearfix">
                        <?php $count = 0; foreach($settings['clients'] as $item):?>
                        <?php if(($count%4) == 0 && $count != 0):?>
                    </ul>
                    <ul class="logo-box logo-box-two clearfix">
                        <?php endif; ?>
                        <li><figure class="image-box"><a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo esc_url($item['client_img']['url']);?>" alt="<?php esc_html_e('Awesome Image', 'naxly');?>"></a></figure></li>
                        <?php $count++; endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- clients-style-two end -->
         
		<?php 
	}

}
