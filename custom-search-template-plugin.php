<?php
/**
 * Plugin Name:  Custom Search Template
 * Description:  Update search page template to remove site search and tabs
 * Plugin URI:   https://github.com/utkwdn/custom-search-template-plugin
 * Author:       The University of Tennessee, Knoxville
 * Version:      1.1.0
 * Text Domain:  custom-search-template
 * Domain Path:  /languages
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CustomSearchTemplate
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Overrides the default WordPress search template with a custom template
 * provided by this plugin.
 *
 * When a search results page is requested, this function checks for a
 * `search.php` template inside the plugin's `templates` directory. If the
 * file exists, it is used instead of the active theme's search template.
 *
 * Hooked to the `template_include` filter.
 *
 * @param string $template Path to the template WordPress intends to load.
 * @return string Modified template path if the custom template exists,
 *                otherwise the original template path.
 */
function override_search_template( $template ) {
	if ( is_search() ) {
		$custom_template = plugin_dir_path( __FILE__ ) . 'templates/search.php';

		if ( file_exists( $custom_template ) ) {
			return $custom_template;
		}
	}

	return $template;
}

add_filter( 'template_include', 'override_search_template' );
