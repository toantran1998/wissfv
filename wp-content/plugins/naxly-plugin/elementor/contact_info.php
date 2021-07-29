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
class Contact_Info extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_contact_info';
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
		return esc_html__( 'Contact Info', 'naxly' );
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
			'contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'naxly' ),
			]
		);
		$this->add_control(
              'information', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Location', 'diaco')],
                			['title' => esc_html__('Make a Call', 'diaco')],
                			['title' => esc_html__('Send a Mail', 'diaco')]
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
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'placeholder' => __( 'Enter your title', 'elementor' ),
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'placeholder' => __( 'Enter your Text', 'elementor' ),
                			],
							[
                    			'name' => 'description',
                    			'label' => esc_html__('Contact Description', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'placeholder' => __( 'Enter your Description', 'elementor' ),
                			],
            			],
            	    'title_field' => '{{title}}',
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
        
        <!-- info-section -->
        <section class="info-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="info-inner">
                        <div class="row clearfix">
                            <?php foreach($settings['information'] as $item):?>
                            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                                <div class="info-box">
                                    <div class="hidden-icon"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                    <div class="box">
                                        <div class="icon-box"><i class="<?php echo esc_attr($item['icons']);?>"></i></div>
                                        <h4><?php echo wp_kses($item['title'], $allowed_tags);?></h4>
                                        <span><?php echo wp_kses($item['text'], $allowed_tags);?></span>
                                    </div>
                                    <div class="text">
                                        <?php echo wp_kses($item['description'], $allowed_tags);?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- info-section end -->	
          
		<?php 
	}

}
