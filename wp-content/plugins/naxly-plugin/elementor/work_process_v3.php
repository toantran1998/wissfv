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
class Work_Process_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_work_process_v3';
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
		return esc_html__( 'Work Process V3', 'naxly' );
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
			'work_process_v3',
			[
				'label' => esc_html__( 'Work Process V3', 'naxly' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Shape Image', 'diaco' ),
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
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Frame the Problem', 'diaco')],
                			['title1' => esc_html__('Collect the Data', 'diaco')],
                			['title1' => esc_html__('Process the Data', 'diaco')]
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
        	
        <!-- porcess-style-three -->
        <section class="porcess-style-three">
            <?php if($settings['bg_img']['url']): ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['bg_img']['url']);?>);"></div><?php endif; ?>
            <div class="auto-container">
                <div class="sec-title text-center light">
                    <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                </div>
                <div class="inner-content">
                    <div class="line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/line-2.png);"></div>
                    <div class="row clearfix">
                        <?php $count = 1; foreach($settings['services'] as $key => $item):?>
                        <div class="col-lg-4 col-md-6 col-sm-12 work-block">
                            <div class="work-block-three">
                                <div class="inner-box">
                                    <div class="arrow-box" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrow-2.png);"></div>
                                    <div class="icon-box">
                                        <i class="<?php echo esc_attr($item['icons']);?>"></i>
                                    </div>
                                    <div class="count-box wow zoomIn animated" data-wow-delay="00ms" data-wow-duration="1500ms"><span><?php $count = sprintf('%02d', $count); echo esc_attr($count); ?></span></div>
                                    <div class="content-box wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <h3><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo wp_kses($item['title1'], $allowed_tags);?></a></h3>
                                        <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $count++; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- porcess-style-three end -->
        
		<?php 
	}

}
