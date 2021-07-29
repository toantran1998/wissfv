<?php
return array(
	'title'      => 'Naxly Service Setting',
	'id'         => 'naxly_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'naxly_service' ),
	'sections'   => array(
		array(
			'id'     => 'naxly_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'naxly' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'naxly' ),
				),
			),
		),
	),
);