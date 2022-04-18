<?php

namespace Lutefisk\Setup;

/**
 * Enqueue scripts and styles
 *
 */
class Enqueue {
	public function register() {
		add_action( 'wp_enqueue_scripts', [ $this, 'lf_enqueue' ] );
	}

	public function lf_enqueue() {
		// CSS
		wp_enqueue_style( 'main', get_stylesheet_uri() . '/assets/dist/css/main.css', [], '1.0', 'all' );

		// JS
		wp_enqueue_style( 'app', get_stylesheet_uri() . '/assets/dist/js/app.js', [], '1.0', true );
	}
}
