<?php
/**
 * Theme config file.
 *
 * @package NAXLY
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['naxly_main_header'][] 	= array( 'naxly_preloader', 98 );
$config['default']['naxly_main_header'][] 	= array( 'naxly_main_header_area', 99 );

$config['default']['naxly_main_footer'][] 	= array( 'naxly_preloader', 98 );
$config['default']['naxly_main_footer'][] 	= array( 'naxly_main_footer_area', 99 );

$config['default']['naxly_sidebar'][] 	    = array( 'naxly_sidebar', 99 );

$config['default']['naxly_banner'][] 	    = array( 'naxly_banner', 99 );


return $config;
