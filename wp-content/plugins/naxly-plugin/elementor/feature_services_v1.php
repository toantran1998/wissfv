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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Feature_Services_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_feature_services_v1';
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
		return esc_html__( 'Feature Services V1', 'naxly' );
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
			'feature_services_v1',
			[
				'label' => esc_html__( 'Feature Services V1', 'naxly' ),
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
				'placeholder' => __( 'Enter your title', 'elementor' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'naxly' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'naxly' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'naxly' ),
					'title'      => esc_html__( 'Title', 'naxly' ),
					'menu_order' => esc_html__( 'Menu Order', 'naxly' ),
					'rand'       => esc_html__( 'Random', 'naxly' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'naxly' ),
					'ASC'  => esc_html__( 'ASC', 'naxly' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'naxly' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'naxly' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'naxly'),
				  'options' => get_service_categories()
				]
		);
		$this->add_control(
            'style_two',
			[
				'label'   => esc_html__( 'Choose Spacing Isuess', 'naxly' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Spacing Style',
				'options' => array(
					'one' => esc_html__( 'Choose Spacing Style One', 'naxly' ),
					'two'  => esc_html__( 'Choose Spacing Style Two', 'naxly' ),
				),
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
		
        $paged = naxly_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-naxly' );
		$args = array(
			'post_type'      => 'naxly_service',
			'posts_per_page' => naxly_set( $settings, 'query_number' ),
			'orderby'        => naxly_set( $settings, 'query_orderby' ),
			'order'          => naxly_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( naxly_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = naxly_set( $settings, 'query_exclude' );
		}
		if( naxly_set( $settings, 'query_category' ) ) $args['service_cat'] = naxly_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
			
            <!--  service-section -->
            <section class="service-section <?php if($settings['style_two'] == 'two') echo 'sec-pad'; else echo '' ; ?>">
                <div class="auto-container">
                    <?php if($settings['subtitle'] || $settings['title']): ?>
                    <div class="sec-title text-center">
                        <p><?php echo wp_kses( $settings['subtitle'], true );?></p>
                        <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                        <div class="decor" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/icons/decor-1.png);"></div>
                    </div>
                    <?php endif; ?>
                    <div class="row clearfix">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><?php the_title(); ?></a></h4>
                                    <div class="icon-box">
                                        <span class="border-layer"></span>
                                        <i class="<?php echo wp_kses(get_post_meta(get_the_id(), 'service_icon', true ), $allowed_tags); ?>"></i>
                                    </div>
                                    <p><?php echo wp_kses(naxly_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <!-- service-section end -->
            
        <?php }
		wp_reset_postdata();
	}

}
