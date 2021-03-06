<?php
/*
Plugin Name: No-Admin-Ajax
Plugin URI: http://www.geniem.com
Description: A plugin that lightens the WP AJAX routine and directs the requests to front-end rather than admin back-end.
Author: Miika Arponen / Geniem Oy
Author URI: http://www.geniem.com
Version: 0.0.2
*/

class No_Admin_Ajax {
	public function __construct() {
		if ( ! is_admin() ) {
			add_filter( 'admin_url', array( $this, 'redirect_ajax_url' ), 11, 3 );
		}
	}

	public function redirect_ajax_url( $url, $path, $blog_id ) {
		if ( strpos( $url, 'async-upload' ) ) {
			return plugins_url( 'async-upload.php', __FILE__ );
		}
		if ( strpos( $url, 'admin-ajax' ) ) {
			return plugins_url( 'ajax-request.php', __FILE__ );
		}
		else {
			return $url;
		}
	}
}

new No_Admin_Ajax();