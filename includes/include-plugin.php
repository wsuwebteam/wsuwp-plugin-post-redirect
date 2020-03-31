<?php namespace WSUWP\Plugin\Post_Redirect;


class Plugin {

	public function init() {

		if ( is_admin() ) {

			require_once __DIR__ . '/include-metabox.php';

		}

		require_once __DIR__ . '/include-redirect.php';

	}


	public static function get_plugin_dir() {

		return plugin_dir_path( dirname( __FILE__ ) );

	}

}

(new Plugin)->init();
