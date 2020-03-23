<?php declare(strict_types=1);
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link https://www.oddytech.fi/
 * @since 1.0.0
 * @package OddyTech\BOILERPLATE
 * @subpackage OddyTech\BOILERPLATE\Includes
 * @author Oddy Tech <production@oddy.fi>
 */

namespace OddyTech\BOILERPLATE\Includes;

class Localize
{
    /**
     * Load the plugin text domain for translation.
     *
     * @since 1.0.0
     */
    public function loadPluginTextDomain()
    {
        load_plugin_textdomain(
            'oddytech-wppb',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
