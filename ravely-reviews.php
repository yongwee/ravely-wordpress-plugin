<?php
/**
 * Ravely Reviews
 *
 * @package       RAVELY
 * @author        Ravely
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Ravely Reviews
 * Plugin URI:    https://ravely.io
 * Description:   Show off your Video and Google testimonials on your site in any of Ravely\'s beautiful review widgets. We also provide a collection form for you to gather reviews from your users!
 * Version:       1.0.0
 * Author:        Ravely
 * Author URI:    https://ravely.io
 * Text Domain:   ravely-reviews
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Ravely Reviews. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function RAVELY() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'RAVELY_NAME',			'Ravely Reviews' );

// Plugin version
define( 'RAVELY_VERSION',		'1.0.0' );

// Plugin Root File
define( 'RAVELY_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'RAVELY_PLUGIN_BASE',	plugin_basename( RAVELY_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'RAVELY_PLUGIN_DIR',	plugin_dir_path( RAVELY_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'RAVELY_PLUGIN_URL',	plugin_dir_url( RAVELY_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once RAVELY_PLUGIN_DIR . 'core/class-ravely-reviews.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Ravely
 * @since   1.0.0
 * @return  object|Ravely_Reviews
 */
function RAVELY() {
	return Ravely_Reviews::instance();
}

RAVELY();

// Add settings page to menu
function ravely_admin_menu_option() {
add_menu_page('Ravely Settings Page', 'Ravely Reviews', 'manage_options', 'ravely-admin-menu', 'render_admin_page', 'dashicons-superhero-alt'/*, 200*/);
}

add_action('admin_menu', 'ravely_admin_menu_option');

function render_admin_page() {
	RAVELY()->admin->render_admin_page();
}

// Define shortcode 
function ravely_embed_shortcode($attrs) {
	$merged_attrs = array_merge(array(
		'key'=>RAVELY()->helpers->get_business_id(),
	), $attrs ? $attrs : []);

	return RAVELY()->helpers->output_embed_code($merged_attrs);
}

add_shortcode('ravely_widget', 'ravely_embed_shortcode');