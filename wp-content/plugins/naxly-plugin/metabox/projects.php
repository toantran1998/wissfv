<?php
return array(
	'title'      => 'Naxly Project Setting',
	'id'         => 'naxly_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'naxly_project' ),
	'sections'   => array(
		array(
			'id'     => 'naxly_projects_meta_setting',
			'fields' => array(
				array(
					'id'       => 'client_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Client Logo Image', 'naxly' ),
					'desc'     => esc_html__( 'Insert Client Logo Image URl', 'naxly' ),
				),
				array(
					'id'    => 'client_name',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Client name', 'naxly' ),
				),
				array(
					'id'       => 'project_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Select Icons', 'naxly' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'naxly' ),
				),
			),
		),
	),
);