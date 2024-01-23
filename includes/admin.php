<?php

namespace HypeLab;

require_once HYPELAB_DIR_PATH . '/includes/loader.php';
require_once HYPELAB_DIR_PATH . '/includes/admin/general.php';
require_once HYPELAB_DIR_PATH . '/includes/admin/settings.php';

class Admin
{
	use Loader;

	private function __construct()
	{
	}

	/**
 	 * Method run on init hook
	 */
	public static function init()
	{
		self::add_action('admin_menu', 'admin_menu');

		$classes = apply_filters('hypelab_admin_classes', [
			Admin\General::class,
			Admin\Settings::class,
		]);

		foreach ($classes as $class) {
			$class::add_action('admin_init', 'admin_init');
			$class::add_action('admin_menu', 'admin_menu');
		}
	}

	/**
 	 * Method run on admin_menu hook
	 */
	public static function admin_menu()
	{
		add_menu_page(
			__('HypeLab', 'hypelab'),
			__('HypeLab', 'hypelab'),
			'administrator',
			'hypelab',
			'',
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBjbGlwLXBhdGg9InVybCglMjNjbGlwMF80NjZfMTQ4MSkiPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjUuMTg3OSAyLjg5NjQ4QzI1LjA5MDIgMi44OTY0OCAyNC45OTk0IDIuOTQ2ODEgMjQuOTQ3NiAzLjAyOTY1TDEyLjc3MSAyMi41MTIyQzEyLjcxMiAyMi42MDY1IDEyLjc3OTkgMjIuNzI4OSAxMi44OTExIDIyLjcyODlIMTkuNTYxNUMxOS42NTkyIDIyLjcyODkgMTkuNzUgMjIuNjc4NiAxOS44MDE4IDIyLjU5NThMMzEuOTc4NCAzLjExMzIyQzMyLjAzNzQgMy4wMTg4NyAzMS45Njk1IDIuODk2NDggMzEuODU4MyAyLjg5NjQ4SDI1LjE4NzlaTTEyLjQzODYgOS4yNzA5OEMxMi4zNDA5IDkuMjcwOTggMTIuMjUwMSA5LjMyMTMgMTIuMTk4NCA5LjQwNDE0TDAuMDIxNzU5MSAyOC44ODY3Qy0wLjAzNzIxMTMgMjguOTgxIDAuMDMwNjIxOCAyOS4xMDM0IDAuMTQxODg3IDI5LjEwMzRINi44MTIyOUM2LjkwOTk3IDI5LjEwMzQgNy4wMDA3NyAyOS4wNTMxIDcuMDUyNTQgMjguOTcwM0wxOS4yMjkxIDkuNDg3NzJDMTkuMjg4MSA5LjM5MzM3IDE5LjIyMDMgOS4yNzA5OCAxOS4xMDkgOS4yNzA5OEgxMi40Mzg2WiIgZmlsbD0idXJsKCUyM3BhaW50MF9saW5lYXJfNDY2XzE0ODEpIi8+PC9nPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhcl80NjZfMTQ4MSIgeDE9IjMxLjk3MiIgeTE9IjIuODk2NDgiIHgyPSIxMi42MzU3IiB5Mj0iMjIuNzI4NyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiUyMzgyMzVGRiIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iJTIzNDMzMEYyIi8+PC9saW5lYXJHcmFkaWVudD48Y2xpcFBhdGggaWQ9ImNsaXAwXzQ2Nl8xNDgxIj48cmVjdCB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIGZpbGw9IndoaXRlIi8+PC9jbGlwUGF0aD48L2RlZnM+PC9zdmc+Cg=='
		);
	}
}
