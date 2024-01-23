<?php

namespace HypeLab\Admin;

if (!defined('ABSPATH')) exit;

require_once HYPELAB_DIR_PATH . '/includes/admin/page.php';

class Settings extends Page
{
	protected const SLUG = 'hypelab-settings';

	public static function admin_menu()
	{
		self::add_submenu_page(
			__('HypeLab Settings', 'hypelab'),
			__('Settings', 'hypelab'),
		);
	}

	public static function admin_init()
	{
		// Register settings
		self::register_setting('hypelab_property_slug', ['type' => 'string', 'default' => '']);
		self::register_setting('hypelab_url', ['type' => 'string', 'default' => '']);
		self::register_setting('hypelab_environment', ['type' => 'string', 'default' => '']);
		// Add sections & fields
		self::add_section(
			'settings',
			__('Settings', 'hypelab'),
			'settings_section'
		);
    self::add_field(
      'property_slug',
      __('Property Slug', 'hypelab'),
      'property_slug_field',
      'settings',
    );
    self::add_field(
      'url',
      __('URL', 'hypelab'),
      'url_field',
      'settings',
    );
    self::add_field(
      'environment',
      __('Environment', 'hypelab'),
      'environment_field',
      'settings',
    );
	}

	/**
	 * Render settings section
	 */
	public static function settings_section()
	{
	}

	/**
   * Render property slug field
	 */
	public static function property_slug_field()
	{
		self::render_field([
			'type' => 'text',
			'name' => 'hypelab_property_slug',
			'value' => get_option('hypelab_property_slug', ''),
		]);
	}

	/**
   * Render url field
	 */
	public static function url_field()
	{
    $current = get_option('hypelab_url', '');
    $options = [
      'https://api.hypelab.com',
      'https://api.hypelab-staging.com',
    ];

    foreach ($options as $key => $option) {
      ?>
        <input id="hypelab_url_<?php echo $key; ?>" name="hypelab_url" type="radio" value="<?php echo $option; ?>" <?php checked($current, $option); ?> />
        <label for="hypelab_url_<?php echo $key; ?>"><?php echo $option; ?></label><br />
      <?php
    }
	}

	/**
   * Render environment field
	 */
	public static function environment_field()
	{
    $current = get_option('hypelab_environment', '');
    $options = [
      'production',
      'development',
    ];

    foreach ($options as $key => $option) {
      ?>
        <input id="hypelab_environment_<?php echo $key; ?>" name="hypelab_environment" type="radio" value="<?php echo $option; ?>" <?php checked($current, $option); ?> />
        <label for="hypelab_environment_<?php echo $key; ?>"><?php echo $option; ?></label><br />
      <?php
    }
	}
}
