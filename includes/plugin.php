<?php

namespace HypeLab;

require_once HYPELAB_DIR_PATH . '/includes/loader.php';
require_once HYPELAB_DIR_PATH . '/includes/admin.php';

class Plugin {
  use Loader;

  private static $_instance = null;

  public static function instance() {
    if (is_null(self::$_instance))
      self::$_instance = new self();
    return self::$_instance;
  }

  private function __construct() {
    self::add_action('init', 'init');
    Admin::add_action('init', 'init');
    self::add_action('wp_enqueue_scripts', 'wp_enqueue_scripts');
    self::add_action('wp_head', 'wp_head');
  }

	/**
 	 * Method run on init hook
	 */
  public static function init() {
    load_plugin_textdomain('hypelab', false, dirname(plugin_basename(__FILE__)) . '/languages');
  }

	/**
 	 * Method run on wp_enqueue_scripts hook
	 */
  public static function wp_enqueue_scripts() {
    $defer_script_loading = get_option('hypelab_deferred_loading', false);
    $script_url = 'https://api.hypelab.com/v1/scripts/hp-sdk.js?v=0';
    $script_handle = 'hypelab';
    
    if ($defer_script_loading) {
      // Enqueue the script with 'defer' attribute
      wp_enqueue_script($script_handle, $script_url, [], null, [ 'strategy' => 'defer' ]);
    } else {
      // Enqueue the script without any special attributes
      wp_enqueue_script($script_handle, $script_url, [], null, []);
    }
  }

	/**
 	 * Method run on wp_head hook
	 */
  public static function wp_head() {
    $property_slug = get_option('hypelab_property_slug', '');
    $environment = get_option('hypelab_environment', '');

    if (!empty($property_slug) && !empty($environment)) {
      echo <<<EOT
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          HypeLab.initialize({
            environment: '{$environment}',
            propertySlug: '{$property_slug}',
          });
        });
      </script>
      EOT;
    }
  }
}
