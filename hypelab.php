<?php
/*
Plugin Name: HypeLab for WordPress
Description: Serve HypeLab ads on your WordPress site
Version: 0.0.2
Author: HypeLab
Author URI: https://www.hypelab.com
Text Domain: hypelab
*/

define('HYPELAB_DIR_PATH', plugin_dir_path(__FILE__));
define('HYPELAB_VERSION', '0.0.2');

require_once HYPELAB_DIR_PATH . '/includes/plugin.php';
\HypeLab\Plugin::instance();
