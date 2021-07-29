<?php

return array(
	'id'     => 'naxly_footer_settings',
	'title'  => esc_html__( "Naxly footer Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'naxly' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'naxly' ),
				'e'    => esc_html__( 'Elementor', 'naxly' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Footer Styles', 'naxly' ),
			'options'  => array(
				'footer_v1' => array(
					'alt' => 'Footer Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
				),
				'footer_v2' => array(
					'alt' => 'Footer Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
				),
				'footer_v3' => array(
					'alt' => 'Footer Style 3',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
				),
				'footer_v4' => array(
					'alt' => 'Footer Style 4',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
				),
				'footer_v5' => array(
					'alt' => 'Footer Style 5',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
				),
				'footer_v6' => array(
					'alt' => 'Footer Style 6',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer6.png',
				),
			),
			'required' => array( array( 'footer_source_type', 'equals', 'd' ) ),
		),
	),
);