<?php

namespace Lutefisk;

use Lutefisk\Setup\Enqueue;

final class Init {

	/**
	 * Store all classes in an array
	 *
	 * @return void
	 */
	public static function get_classes() {
		return [
			Enqueue::class,
			Menu::class,
			Setup::class,
		];
	}

	/**
	 * Loop through the classes, instantiate them, and call the register() method if it exists
	 *
	 * @return void
	 */
	public static function register_classes() {
		foreach ( self::get_classes() as $class ) {
			$class = self::instantiate( $class );

			if ( method_exists( $class, 'register' ) ) {
				$class->register();
			}
		}
	}

	/**
	 * Instantiate the class
	 *
	 * @param class $class
	 * @return class instance
	 */
	private static function instantiate( $class ) {
		return new $class;
	}
}
