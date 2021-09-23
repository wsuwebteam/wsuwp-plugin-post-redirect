<?php namespace WSUWP\Plugin\Post_Redirect;


class Redirect {

	public function init() {

		add_action( 'wp', __CLASS__ . '::do_redirect' );

	}


	public static function do_redirect() {

		$post_types = array( 'post', 'news_article', 'press_release' );

		if ( in_array( get_post_type(), $post_types, true ) ) {

			$post_id = get_the_ID();

			$redirect_url = get_post_meta( $post_id, 'wsuwp_post_redirect', true );

			if ( ! empty( $redirect_url ) ) {

				wp_redirect( $redirect_url );

				exit;

			}
		}

	}

}

(new Redirect)->init();
