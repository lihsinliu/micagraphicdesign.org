<?php
/* 
Plugin Name: jQuery Migrate Fix for Pinboard 1.0.8
Plugin URI: http://kungfugrep.com
Description: A plugin to fix the 1.0.8 version of the Pinboard Theme
Version: 1.0
Author: Chris Klosowski
Author URI: http://kungfugrep.com
License: GPLv2 only
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'init', 'ck_pinboard_jqmigrate_fix' );

function ck_pinboard_jqmigrate_fix() {
	if ( file_exists( get_template_directory() . '/scripts/jquery-migrate.js' ) )
			wp_register_script( 'jquery-migrate', get_template_directory_uri() . '/scripts/jquery-migrate.js', array( 'jquery' ), null );
}
