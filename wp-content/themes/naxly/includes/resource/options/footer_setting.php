<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'naxly' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'naxly' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'naxly' ),
				'e' => esc_html__( 'Elementor', 'naxly' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'naxly' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'naxly' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'naxly' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'naxly' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
			    'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
			    ),
			    'footer_v6'  => array(
				    'alt' => esc_html__( 'Footer Style 6', 'naxly' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer6.png',
			    ),
				
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_set',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'    => 'footer_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'naxly' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'naxly' ),
			'default' => 'Copyright © <a href="#">Naxly</a>, All Rights Reserved.',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'copyright_text2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'naxly' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'naxly' ),
			'default' => 'Copyright © <a href="#"> Naxly </a>, All Rights Reserved.',
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_logo_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'naxly' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/footer-logo-2.png' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_menu_2',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'copyright_text3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'naxly' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'naxly' ),
			'default' => 'Copyright © <a href="#"> Naxly </a>, All Rights Reserved.',
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_menu_3',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'       => 'bg_shape_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Shape Image', 'naxly' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/shape/shape-31.png' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_menu_4',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'       => 'bg_shape_image_2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Shape Image', 'naxly' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/shape/shape-45.png' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'copyright_text5',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'naxly' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'naxly' ),
			'default' => 'Copyright © <a href="#"> Naxly </a>, All Rights Reserved.',
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_menu_5',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		/***********************************************************************
								Footer Version 6 Start
		************************************************************************/
		array(
			'id'       => 'footer_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Six Settings', 'naxly' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'copyright_text6',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'naxly' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'naxly' ),
			'default' => 'Copyright © <a href="#"> Naxly </a>, All Rights Reserved.',
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_menu_6',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'naxly' ),
			'desc'    => esc_html__( 'Enter the raw html', 'naxly' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
