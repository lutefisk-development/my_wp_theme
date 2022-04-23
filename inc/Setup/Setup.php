<?php

namespace Lutefisk\Setup;

/**
 * Generic setup
 *
 */
class Setup {
	public function register() {
		add_action( 'after_theme_setup', [ $this, 'lf_theme_setup' ] );
	}

	public function lf_theme_setup() {
		/**
		 * Make theme available for translation
		 *
		 */
		load_text_domain( 'lute', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to the head
		 *
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and page
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Let WordPress manage the document title
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us
		 *
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add theme support for selective refresh for widgets
		 *
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
