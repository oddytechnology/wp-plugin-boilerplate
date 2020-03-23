<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link https://www.oddytech.fi/
 * @since 1.0.0
 * @package OddyTech\BOILERPLATE
 * @author Oddy Tech <production@oddy.fi>
 *
 * @wordpress-plugin
 * Plugin Name: Oddy Tech BOILERPLATE for WordPress
 * Plugin URI: https://www.oddytech.fi/
 * Description: BOILERPLATE description
 * Version: 1.0.0
 * Author: Oddy Tech
 * Author URI: https://www.oddytech.fi/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oddytech-boilerplate
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('OT_WPPB_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Bootstrap.php
 */
function activate_ot_wppb() {
    require_once plugin_dir_path(__FILE__) . 'includes/Bootstrap.php';

    OddyTech\BOILERPLATE\Includes\Bootstrap::activate();
}
register_activation_hook(__FILE__, 'activate_ot_wppb');

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/Bootstrap.php
 */
function deactivate_ot_wppb() {
    require_once plugin_dir_path(__FILE__) . 'includes/Bootstrap.php';

    OddyTech\BOILERPLATE\Includes\Bootstrap::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_ot_wppb');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/BOILERPLATE.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_ot_wppb() {
    $plugin = new OddyTech\BOILERPLATE\Includes\BOILERPLATE();
    $plugin->run();
}
run_ot_wppb();
