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
    wp_enqueue_script('hypelab', 'https://api.hypelab.com/v1/scripts/hp-sdk.js?v=0', [], null, [ 'strategy' => 'defer' ]);
  }

	/**
 	 * Method run on wp_head hook
	 */
  public static function wp_head() {
    $property_slug = get_option('hypelab_property_slug', '');
    $url = get_option('hypelab_url', '');
    $environment = get_option('hypelab_environment', '');

    if (!empty($property_slug) && !empty($url) && !empty($environment)) {
      echo <<<EOT
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          HypeLab.initialize({
            propertySlug: '{$property_slug}',
            URL: '{$url}',
            environment: '{$environment}',
          });
        });
      </script>
      EOT;
    }
  }
}
