<?php


defined( 'NAXLY_NAME' ) or define( 'NAXLY_NAME', 'naxly' );

define( 'NAXLY_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'naxly_wp_load', 5 );

function naxly_wp_load() {

	defined( 'NAXLY_URL' ) or define( 'NAXLY_URL', get_template_directory_uri() . '/' );
	define(  'NAXLY_KEY','!@#naxly');
	define(  'NAXLY_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'NAXLY_NONCE' ) ) {
		define( 'NAXLY_NONCE', 'naxly_wp_theme' );
	}

	( new \NAXLY\Includes\Classes\Base )->loadDefaults();
	( new \NAXLY\Includes\Classes\Ajax )->actions();

}
