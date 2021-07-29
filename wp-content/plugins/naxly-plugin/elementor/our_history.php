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
class Our_History extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_our_history';
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
		return esc_html__( 'Our History', 'naxly' );
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
			'our_history',
			[
				'label' => esc_html__( 'Our History', 'naxly' ),
			]
		);
		$this->add_control(
			'bg_shape_img',
				[
				  'label' => __( 'Background Shape Image', 'diaco' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'arrow_img',
				[
				  'label' => __( 'Arrow Image', 'diaco' ),
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
				'placeholder' => __( 'Our History', 'elementor' ),
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
                			['title1' => esc_html__('Founded', 'diaco')],
                			['title1' => esc_html__('Fresh Ideas', 'diaco')],
                			['title1' => esc_html__('Service Award', 'diaco')],
							['title1' => esc_html__('Milestone', 'diaco')],
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
                    			'name' => 'text1',
                    			'label' => esc_html__('Text', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'diaco')
                			],
							[
                    			'name' => 'year',
                    			'label' => esc_html__('Year', 'diaco'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter The Year', 'diaco')
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
        	
        <!-- history-section -->
        <section class="history-section">
            <?php if($settings['bg_shape_img']['url']): ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['bg_shape_img']['url']);?>);"></div><?php endif; ?>
            <?php if($settings['arrow_img']['url']): ?><div class="arrow-box" style="background-image: url(<?php echo esc_url($settings['arrow_img']['url']);?>);"></div><?php endif; ?>
            <?php if($settings['feature_img']['url']): ?><figure class="image-layer js-tilt"><img src="<?php echo esc_url($settings['feature_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure><?php endif; ?>
            <div class="auto-container">
                <div class="sec-title text-left">
                    <p><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></p>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                    <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                </div>
                <div class="inner-box clearfix">
                    <?php $count = 1; foreach($settings['services'] as $key => $item):?>
                    <?php if($count % 2): ?>
                    <div class="single-item">
                        <div class="inner wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="content-box">
                                <h4><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo wp_kses($item['title1'], $allowed_tags);?></a></h4>
                                <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                            </div>
                            <div class="year"><span><?php echo wp_kses($item['year'], $allowed_tags);?></span></div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="single-item">
                        <div class="inner wow slideInDown" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="year"><span><?php echo wp_kses($item['year'], $allowed_tags);?></span></div>
                            <div class="content-box">
                                <h4><a href="about.html"><?php echo wp_kses($item['title1'], $allowed_tags);?></a></h4>
                                <p><?php echo wp_kses($item['text1'], $allowed_tags);?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; $count++; endforeach;?>
                </div>
            </div>
        </section>
        <!-- history-section end -->
        
		<?php 
	}

}
