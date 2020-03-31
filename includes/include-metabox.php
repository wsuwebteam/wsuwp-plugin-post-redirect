<?php namespace WSUWP\Plugin\Post_Redirect;


class Metabox {

	protected static $nonce = 'wsuwp_post_redirect_nonce';
	protected static $nonce_action = 'wsuwp_post_redirect_save_post';

	public function init() {

		add_action( 'add_meta_boxes', __CLASS__ . '::add_metabox' );

		add_action( 'save_post', __CLASS__ . '::save', 10, 3 );

	}


	public static function add_metabox() {

		add_meta_box(
			'wsuwp_post_redirect',           // Unique ID
			'Redirect Post',  // Box title
			__CLASS__ . '::render_metabox',  // Content callback, must be of type callable
			'post',                 // Post type
			'side'
		);

	}


	public static function render_metabox( $post ) {

		$redirect = get_post_meta( $post->ID, 'wsuwp_post_redirect', true );

		wp_nonce_field( self::$nonce_action, self::$nonce );

		include Plugin::get_plugin_dir() . '/template-parts/metabox.php';

	}


	public static function save( $post_id, $post, $update ) {

		if ( $update && 'post' === $post->post_type ) {

			require_once Plugin::get_plugin_dir() . '/classes/class-save-post.php';

			$save_post = new Save_Post( array( 'wsuwp_post_redirect' => array() ), self::$nonce_action, self::$nonce );

			$save_post->save_post( $post_id, $post, $update );

		}

	}

}

(new Metabox)->init();
