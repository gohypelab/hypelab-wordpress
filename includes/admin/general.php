<?php

namespace HypeLab\Admin;

if (!defined('ABSPATH')) exit;

require_once HYPELAB_DIR_PATH . '/includes/admin/page.php';

class General extends Page
{
	protected const SLUG = 'hypelab';

	public static function admin_menu()
	{
		self::add_submenu_page(
			__('HypeLab', 'hypelab'),
			__('General', 'hypelab'),
		);
	}

	public static function admin_init()
	{
		self::add_filter('hypelab_admin_partial', 'admin_partial', 0, 2);
	}

	/**
	 * Override default admin page partial
	 */
	public static function admin_partial($partial, $slug)
	{
		if ($slug === static::SLUG)
			return HYPELAB_DIR_PATH . '/partials/admin/general.php';
		return $partial;
	}
}
