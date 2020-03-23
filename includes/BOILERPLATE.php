<?php declare(strict_types=1);
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @link https://www.oddytech.fi/
 * @since 1.0.0
 * @package OddyTech\BOILERPLATE
 * @subpackage OddyTech\BOILERPLATE\Includes
 * @author Oddy Tech <production@oddy.fi>
 */

namespace OddyTech\BOILERPLATE\Includes;
use OddyTech\BOILERPLATE\Admin;

class BOILERPLATE
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since 1.0.0
     * @access protected
     * @var BOILERPLATE $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since 1.0.0
     * @access protected
     * @var string $pluginName The string used to uniquely identify this plugin.
     */
    protected $pluginName;

    /**
     * The current version of the plugin.
     *
     * @since 1.0.0
     * @access protected
     * @var string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        if (defined('OT_WPPB_VERSION')) {
            $this->version = OT_WPPB_VERSION;
        } else {
            $this->version = '1.0.0';
        }

        $this->pluginName = 'oddytech-wppb';
        $this->loadDependencies();
        $this->setLocale();
        $this->defineAdminHooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - OddyTech\BOILERPLATE\Includes\Loader. Orchestrates the hooks of the plugin.
     * - OddyTech\BOILERPLATE\Includes\i18n. Defines internationalization functionality.
     * - OddyTech\BOILERPLATE\Admin\Admin. Defines all hooks for the admin area.
     * - OddyTech\BOILERPLATE\Public\Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since 1.0.0
     * @access private
     */
    private function loadDependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__ )) . 'includes/Loader.php';
        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__ )) . 'includes/Localize.php';
        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__ )) . 'admin/Admin.php';

        $this->loader = new Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the OddyTech\BOILERPLATE\Localize class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since 1.0.0
     * @access private
     */
    private function setLocale()
    {
        $pluginLocale = new Localize();
        $this->loader->addAction('plugins_loaded', $pluginLocale, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since 1.0.0
     * @access private
     */
    private function defineAdminHooks()
    {
        $pluginAdmin = new Admin\Admin($this->getPluginName(), $this->getVersion());
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_styles');
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_scripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since 1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since 1.0.0
     * @return string The name of the plugin.
     */
    public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since 1.0.0
     * @return OddyTech\BOILERPLATEer\Loader Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since 1.0.0
     * @return string The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }
}
