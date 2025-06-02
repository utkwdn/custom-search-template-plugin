<?php
/**
* Plugin Name:  Custom Search Template
* Description:  Update search page template to remove site search and tabs
* Plugin URI:   https://www.utk.edu
* Author:       The University of Tennessee, Knoxville
* Version:      1.0
* Text Domain:  custom-search-template
* Domain Path:  /languages
* License:      GPL v2 or later
* License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
**/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

add_filter('template_include', 'override_search_template');

function override_search_template($template) {
	if (is_search()) {
		$custom_template = plugin_dir_path(__FILE__) . 'templates/search.php';

		if (file_exists($custom_template)) {
			return $custom_template;
		}
	}
	
	return $template;
}