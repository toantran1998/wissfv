<?php
return array(
	'title'      => 'Naxly Testimonials Setting',
	'id'         => 'naxly_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'naxly_testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'naxly_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'       => 'client_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Client Logo Image', 'naxly' ),
					'desc'     => esc_html__( 'Insert Client Logo Image URl', 'naxly' ),
				),
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'naxly' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'naxly' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default'  => '5',
				),
			),
		),
	),
);