<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'naxly_setup_theme' );
add_action( 'after_setup_theme', 'naxly_load_default_hooks' );


function naxly_setup_theme() {

	load_theme_textdomain( 'naxly', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post', 'page-attributes' );
	add_theme_support( 'post-formats', array('quote') );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	//Register image sizes
	add_image_size( 'naxly_250x312', 250, 312, true ); //'naxly_250x312 Our Testimonials V1'
	add_image_size( 'naxly_270x220', 270, 220, true ); //'naxly_270x220 Case Studies'
	add_image_size( 'naxly_570x400', 570, 400, true ); //'naxly_570x400 Case Studies V4'
	add_image_size( 'naxly_370x250', 370, 250, true ); //'naxly_370x250 Latest News'
	add_image_size( 'naxly_370x520', 370, 520, true ); //'naxly_370x520 Blog Masonry '
	add_image_size( 'naxly_370x350', 370, 350, true ); //'naxly_370x350 Blog Masonry'
	add_image_size( 'naxly_370x340', 370, 340, true ); //'naxly_370x340 Case Studies V2'
	add_image_size( 'naxly_553x432', 553, 432, true ); //'naxly_553x432 Our Testimonials V2'
	add_image_size( 'naxly_245x250', 245, 250, true ); //'naxly_245x250 Our Team'
	add_image_size( 'naxly_200x160', 200, 160, true ); //'naxly_200x160 Feature Services V2'
	add_image_size( 'naxly_136x143', 136, 143, true ); //'naxly_136x143 Feature Services V3'
	add_image_size( 'naxly_225x215', 225, 215, true ); //'naxly_225x215 Our Services V2'
	add_image_size( 'naxly_140x140', 140, 140, true ); //'naxly_140x140 Our Team V2'
	add_image_size( 'naxly_80x80', 80, 80, true ); //'naxly_80x80 Awards Section V2'
	add_image_size( 'naxly_1170x250', 1170, 250, true ); //'naxly_1170x250 Our Blog'
	add_image_size( 'naxly_105x105', 105, 105, true ); //'naxly_105x105 Our Projects '
	add_image_size( 'naxly_85x85', 85, 85, true ); //'naxly_85x85 Latest Work Widget'
	
	
	



	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'naxly' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'naxly' ),
		'home_rtl_menu' => esc_html__( 'Home RTL Menu', 'naxly' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'naxly_admin_init', 2000000 );
}

function naxly_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'naxly' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'naxly' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'naxly' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'naxly' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'naxly' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'naxly' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'naxly' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'naxly' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'naxly' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'naxly_gutenberg_editor_palette_styles' );

/**
 * [naxly_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function naxly_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( NAXLY_NAME . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'naxly' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'naxly' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'naxly'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="decor" style="background-image: url('.get_template_directory_uri().'/assets/images/icons/decor-3.png);"></div></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'naxly'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'naxly'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'naxly'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Five', 'naxly'),
		'id' => 'footer-sidebar-5',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Six', 'naxly'),
		'id' => 'footer-sidebar-6',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'naxly'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="decor" style="background-image: url('.get_template_directory_uri().'/assets/images/icons/decor-3.png);"></div></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'naxly'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'naxly'),
		'before_widget'=>'<div id="%1$s" class="service-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'naxly' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'naxly' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if ( ! is_object( naxly_WSH() ) ) {
		return;
	}

	$sidebars = naxly_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( naxly_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'naxly_widgets_init' );

/**
 * [naxly_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function naxly_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [naxly_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'naxly_set' ) ) {
	function naxly_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}
function naxly_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'naxly_add_editor_styles' );

// Add specific CSS class by filter.
$options = naxly_WSH()->option(); 
if( naxly_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}