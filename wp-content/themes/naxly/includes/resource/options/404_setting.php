<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'naxly' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'naxly' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'naxly' ),
				'e' => esc_html__( 'Elementor', 'naxly' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'naxly' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'naxly' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'naxly' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'naxly' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'naxly' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'naxly' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'naxly' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),

		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'naxly' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'naxly' ),

		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'naxly' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'naxly' ),

		),
		array(
			'id'    => '404_page_form',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Search Form', 'naxly' ),
			'desc'  => esc_html__( 'Enable to show search form on 404 page', 'naxly' ),
			'default'  => true,
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'naxly' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'naxly' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'naxly' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'naxly' ),
			'default'  => esc_html__( 'Back To Home Page', 'naxly' ),
			'required' => array( 'back_home_btn', '=', true ),
		),

		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),

	),
);





