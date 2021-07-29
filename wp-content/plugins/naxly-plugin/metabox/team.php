<?php
return array(
	'title'      => 'Naxly Team Setting',
	'id'         => 'naxly_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'naxly_team' ),
	'sections'   => array(
		array(
			'id'     => 'naxly_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'naxly' ),
				),
				array(
					'id'    => 'email_address',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'naxly' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'naxly' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'naxly' ),
				),
			),
		),
	),
);