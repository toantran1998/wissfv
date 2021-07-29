<?php

namespace NAXLY\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 *
	 * @return array Returns the array of scripts to load
	 */
	public static function scripts() {
		$options = get_theme_mod( NAXLY_NAME . '_options-mods' );
		$ssl     = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'popper'         => 'assets/js/popper.min.js',
			'bootstrap'         => 'assets/js/bootstrap.min.js',
			'owl'     => 'assets/js/owl.js',
			'wow'          => 'assets/js/wow.js',
			'jquery-fancybox'           => 'assets/js/jquery.fancybox.js',
			'appear'      => 'assets/js/appear.js',
			'jquery-countto'      		=> 'assets/js/jquery.countTo.js',
			'scrollbar'      		=> 'assets/js/scrollbar.js',
			'tilt-jquery'      		=> 'assets/js/tilt.jquery.js',
			'bxslider'      		=> 'assets/js/bxslider.js',
			'isotope'      		=> 'assets/js/isotope.js',
			'countdown'      		=> 'assets/js/countdown.js',
			'pagenav'      		=> 'assets/js/pagenav.js',
			'main-script'      		=> 'assets/js/script.js',
		);

		$scripts = apply_filters( 'NAXLY/includes/classes/header_enqueue/scripts', $scripts );
		/**
		 * Enqueue the scripts
		 *
		 * @var array
		 */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( "{$name}", $js, '', '', true );
			} else {
				wp_register_script( "{$name}", get_template_directory_uri() . '/' . $js, '', '', true );
			}
		}

		wp_enqueue_script( array(
			'jquery',
			'popper',
			'bootstrap',
			'owl',
			'wow',
			'jquery-fancybox',
			'appear',
			'jquery-countto',
			'scrollbar',
			'tilt-jquery',
			'bxslider',
			'isotope',
			'countdown',
			'pagenav',
			'main-script',
		) );


		$header_data = array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nonce'   => wp_create_nonce( NAXLY_NONCE ),
		);

		wp_localize_script( 'jquery', 'naxly_data', $header_data );

		if ( naxly_set( $options, 'footer_js' ) ) {

			wp_add_inline_script( 'jquery', naxly_set( $options, 'footer_js' ) );
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 *
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {
		$styles = array(
			'google-fonts'      => self::fonts_url(),
			'bootstrap'      => 'assets/css/bootstrap.css',
			'font-awesome'      => 'assets/css/font-awesome-all.css',
			'flaticon'      => 'assets/css/flaticon.css',
			'owl'      => 'assets/css/owl.css',
			'jquery-fancybox'      => 'assets/css/jquery.fancybox.min.css',
			'animate'      => 'assets/css/animate.css',
			'imagebg'      => 'assets/css/imagebg.css',
			'global'      => 'assets/css/global.css',
			'header'      => 'assets/css/header.css',
			'color'      => 'assets/css/color.css',
			'main-style'        => 'assets/css/style.css',
			'custom'			=> 'assets/css/custom.css',
			'tut'			=> 'assets/css/tut.css',
			'gutenberg'			=> 'assets/css/gutenberg.css',
			'responsive'        => 'assets/css/responsive.css',
		);

		$styles = apply_filters( 'NAXLY/includes/classes/header_enqueue/styles', $styles );

		/**
		 * Enqueue the styles
		 *
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( "naxly-{$name}", $style );
			} else {
				wp_enqueue_style( "naxly-{$name}", get_template_directory_uri() . '/' . $style );
			}
		}
		$options      = naxly_WSH()->option();
		$custom_style = '';

		wp_add_inline_style( 'color', $custom_style );

		$header_styles = self::header_styles(); 
		
		if ( $custom_font = $options->get('theme_custom_font') ) {
            $header_styles .= naxly_custom_fonts_load( $custom_font );
        }

		wp_add_inline_style( 'naxly-main-style', $header_styles );
	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['Josefin-Sans']      = 'Josefin Sans:300,400,600,700';
		$font_families['Muli']      = 'Muli:300,400,500,600,700,800,900';
		
		$font_families = apply_filters( 'NAXLY/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since NAXLY 1.0
	 *
	 * @param array  $urls          URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 *
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'naxly-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since NAXLY 1.0
	 *
	 * @param array $urls URLs to print for resource hints.
	 */
	public static function header_styles() {

		$data = \NAXLY\Includes\Classes\Common::instance()->data( 'blog' )->get();

		$options = naxly_WSH()->option();

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) . " !important;

			}";

		endif;

		$settings = get_theme_mod( NAXLY_NAME . '_options-mods' );

		if ( $custom_font = naxly_set( $settings, 'theme_custom_font' ) ) {

			$styles .= apply_filters('naxly_redux_custom_fonts_load', $custom_font );


		}

		return $styles;
	}


}