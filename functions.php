<?php

if ( file_exists( __FILE__ ) . '/vendor/autoload.php' ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php' ;
}

if ( class_exists( 'Lutefisk\Init' ) ) {
	Lutefisk\Init::register_classes();
}
