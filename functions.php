<?php
/**
 * Funções do child theme IPS Twenty Twenty-Five Child.
 *
 * @package IPS_TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue dos estilos principais do child theme.
 */
function ips_twentytwentyfive_child_enqueue_styles(): void {
	wp_enqueue_style(
		'ips-twentytwentyfive-child-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ips_twentytwentyfive_child_enqueue_styles' );

/**
 * Carrega os estilos específicos da homepage tanto no site como no editor
 * Gutenberg/Site Editor. Todas as regras estão limitadas à classe .ips-home.
 */
function ips_twentytwentyfive_child_enqueue_home_assets(): void {
	$relative_path = '/assets/css/home.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-home',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-style' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_home_assets' );
