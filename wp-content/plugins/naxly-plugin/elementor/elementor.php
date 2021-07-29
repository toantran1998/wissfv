<?php

namespace NAXLYPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page
		'banner_v1',
		'feature_services_v1',
		'about_company',
		'work_process_v1',
		'our_industries',
		'our_skills',
		'testimonials_v1',
		'case_studies',
		'funfacts',
		'latest_news',
		'our_clients',
		//Home Page Two
		'banner_v2',
		'subscribe_form',
		'about_company_v2',
		'our_services_v1',
		'case_studies_v2',
		'work_process_v2',
		'why_choose_us',
		'testimonials_v2',
		'latest_news_v2',
		'our_clients_v2',
		'contact_info',
		//Home Page Three
		'banner_v3',
		'our_technology',
		'about_company_v3',
		'why_choose_us_v2',
		'our_team',
		'case_studies_v3',
		'video_and_faqs',
		'pricing_plan',
		'latest_news_v3',
		'testimonials_v3',
		//Home Page Four
		'banner_v4',
		'feature_services_v2',
		'our_technology_v2',
		'about_company_v4',
		'why_choose_us_v3',
		'funfacts_v2',
		'our_skills_v2',
		'testimonials_v4',
		'subscribe_form_v2',
		'latest_news_v4',
		'contact_form',
		//Home Page Five
		'banner_v5',
		'feature_services_v3',
		'about_company_v5',
		'our_services_v2',
		'work_process_v3',
		'subscribe_form_v3',
		'case_studies_v4',
		'our_team_v2',
		'latest_news_v5',
		'awards_section',
		'contact_form_v2',
		//inner Page
		'about_company_v6',
		'our_history',
		'why_choose_us_v4',
		'testimonials_v5',
		'our_team_v3',
		'contact_info_v2',
		'google_map',
		'our_solutions',
		'work_process_v4',
		'awards_section_v2',
		'service_detail_v1',
		'recent_case_studies',
		'service_contact_form',
		'our_projects_v1',
		'our_projects_v2',
		'our_projects_v3',
		'blog_grid_view',
		'blog_with_sidebar',
		'blog_masonry',
		'comming_soon',
		'our_faqs',
		//Elements
		'case_studies_carousel',
		'funfacts_v3',
		'funfacts_v4',
		'news_carousel',
		'news_carousel_v2',
		'team_carousel',
		'team_carousel_v2',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = NAXLYPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\NAXLYPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'naxly',
			[
				'title' => esc_html__( 'Naxly', 'naxly' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'naxly' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();