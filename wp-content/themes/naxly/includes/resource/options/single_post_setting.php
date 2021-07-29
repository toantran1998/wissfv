<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'naxly' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'naxly' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'naxly' ),
				'e' => esc_html__( 'Elementor', 'naxly' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'naxly' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'naxly' ),
			'default' => false,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_tag',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tags', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show post tags on posts single page', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'naxly' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'naxly' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'naxly' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'naxly' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'naxly' ),
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





