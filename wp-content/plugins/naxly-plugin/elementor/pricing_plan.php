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
class Pricing_Plan extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_pricing_plan';
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
		return esc_html__( 'Pricing Plan', 'naxly' );
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
			'pricing_plan',
			[
				'label' => esc_html__( 'Pricing Plan', 'naxly' ),
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
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default'     => __( 'Pricing & Plans', 'elementor' ),
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
              'pricing_table', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Basic', 'diaco')],
                			['block_title' => esc_html__('Advanced', 'diaco')],
                			['block_title' => esc_html__('Premium', 'diaco')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'block_text',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'currency',
                    			'label' => esc_html__('Currency Symbols', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'price',
                    			'label' => esc_html__('Price', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'duration',
                    			'label' => esc_html__('Duration', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Get Started', 'diaco')
                			],
							[
                    			'name' => 'ext_link',
								'label' => __( 'External Url', 'diaco' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{block_title}}',
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
        	
            <!-- pricing-section -->
            <section class="pricing-section">
                <div class="title-inner bg-color-1">
                    <div class="auto-container">
                        <div class="sec-title text-center">
                            <p><?php echo wp_kses( $settings['subtitle'], true );?></p>
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                            <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="lower-content">
                    <div class="auto-container">
                        <div class="inner-container">
                            <div class="row clearfix">
                            	<?php foreach($settings['pricing_table'] as $key => $item):?>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-one <?php if($key == 1) echo 'active-block'; ?> wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="pricing-table">
                                            <div class="table-header">
                                                <div class="header-upper">
                                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                                    <p><?php echo wp_kses($item['block_text'], true);?></p>
                                                </div>
                                                <div class="header-lower">
                                                    <h1><span><?php echo wp_kses($item['currency'], true);?></span><?php echo wp_kses($item['price'], true);?></h1>
                                                    <p><?php echo wp_kses($item['duration'], true);?></p>
                                                </div>
                                            </div>
                                            <div class="table-content">
                                                <ul>
                                                    <?php $fearures = explode("\n", ($item['feature_str']));?>
													<?php foreach($fearures as $feature):?>
                                                    <li><?php echo wp_kses($feature, true); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="table-footer">
                                                <a href="<?php echo esc_url($item['ext_link']['url']);?>" class="btn-style-eight"><i class="flaticon-next"></i><?php echo wp_kses($item['btn_title'], true);?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- pricing-section end -->
            
		<?php 
	}

}
