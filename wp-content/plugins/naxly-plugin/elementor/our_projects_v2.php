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
class Our_Projects_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'naxly_our_projects_v2';
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
		return esc_html__( 'Our Projects V2', 'naxly' );
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
			'our_projects_v2',
			[
				'label' => esc_html__( 'Our Projects V2', 'naxly' ),
			]
		);
		$this->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number of post', 'fixkar' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'fixkar' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'fixkar' ),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'fixkar' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'fixkar' ),
					'ASC'  => esc_html__( 'ASC', 'fixkar' ),
				),
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'fixkar' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'fixkar' ),
					'title'      => esc_html__( 'Title', 'fixkar' ),
					'menu_order' => esc_html__( 'Menu Order', 'fixkar' ),
					'rand'       => esc_html__( 'Random', 'fixkar' ),
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
		
		$paged = get_query_var('paged');
		$paged = naxly_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-fixkar' );
		$args = array(
			'post_type'      => 'naxly_project',
			'posts_per_page' => naxly_set( $settings, 'number' ),
			'orderby'        => naxly_set( $settings, 'query_orderby' ),
			'order'          => naxly_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",naxly_set( $settings, 'cat_exclude' ));
		if(naxly_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$client_image = get_post_meta( get_the_id(), 'client_image', true );
			
            ?>
            <!--Gallery Item-->
            <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
                <div class="case-block-two">
                    <div class="inner-box">
                        <figure class="image-box">
                            <?php the_post_thumbnail('naxly_370x340'); ?>
                            <div class="client-box">
                                <span><?php echo esc_attr(get_post_meta( get_the_id(), 'client_name', true ));?></span>
                                <div class="client-logo"><img src="<?php echo esc_url($client_image['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></div>
                            </div>
                            <div class="link"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="flaticon-hyperlink"></i></a></div>
                            <div class="overlay-layer"></div>
                        </figure>
                        <div class="lower-content">
                            <div class="box">
                                <div class="icon-box"><i class="<?php echo esc_attr(get_post_meta(get_the_id(), 'project_icon', true )); ?>"></i></div>
                                <p><?php echo implode( ', ', (array)$term_list );?></p>
                                <h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
            
            <!-- project-two-column -->
            <section class="project-three-column project-page">
                <div class="auto-container">
                    <div class="sortable-masonry">
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button" data-filter=".all"><?php esc_attr_e('[view All]', 'naxly');?></li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(naxly_set( $t, 'slug' )); ?>"><?php echo naxly_set( $t, 'name'); ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="items-container row clearfix">
                            <?php echo wp_kses($data_posts, $allowed_tags); ?>
                        </div>
                        <div class="pagination-wrapper text-center">
                            <?php naxly_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => 'Next <i class="fas fa-angle-double-right"></i> ', 'prev_text' => '<i class="fas fa-angle-double-left"></i> Prev')); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- project-two-column end -->
            
    	<?php }
	}

}
