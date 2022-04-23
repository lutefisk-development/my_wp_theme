<?php

namespace Lutefisk\Setup;

/**
 * Register menus and sidebars
 *
 */
class Menu {
	public function register() {
		add_action( 'after_theme_setup', [ $this, 'lf_register_menus' ] );
		add_action( 'widgets_init', [ $this, 'lf_widgets_init' ] );
	}

	/**
	 * Register nav menues
	 *
	 */
	public function lf_register_menus() {
		register_nav_menus([
			'header' => esc_html__( 'Header', 'lute' ),
			'footer' => esc_html__( 'Footer', 'lute' ),
		]);
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function lf_widgets_init() {
		register_sidebar([
			'name'          => esc_html__( 'Sidebar', 'lute' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here', 'lute' ),
			'before_widget' => '<section id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]);
	}
}
