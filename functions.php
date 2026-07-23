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
 * Carrega os estilos principais do child theme no site e nos editores de blocos.
 */
function ips_twentytwentyfive_child_enqueue_styles(): void {
	wp_enqueue_style(
		'ips-twentytwentyfive-child-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_styles' );

/**
 * Carrega os estilos específicos da homepage no site e no Gutenberg/Site Editor.
 * Todas as regras estão limitadas à classe .ips-home.
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
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_home_assets', 20 );

/**
 * Carrega os estilos da página pública da app e das páginas legais.
 * As regras estão limitadas às classes .ips-app-page e .ips-legal-page,
 * permitindo que os padrões sejam editados no Gutenberg sem afetar outras páginas.
 */
function ips_twentytwentyfive_child_enqueue_leveza_app_assets(): void {
	$relative_path = '/assets/css/leveza-app.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-leveza-app',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-style' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_leveza_app_assets', 30 );

/**
 * Carrega os ajustes de layout da página Leveza com Estrutura.
 * O ficheiro é carregado depois do CSS principal para funcionar como camada de refinamento.
 */
function ips_twentytwentyfive_child_enqueue_leveza_layout_assets(): void {
	$relative_path = '/assets/css/leveza-app-layout.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-leveza-layout',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-leveza-app' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_leveza_layout_assets', 40 );

/**
 * Carrega os estilos da Homepage IPS v2.
 * Todas as regras estão limitadas à classe .ips-home-v2.
 */
function ips_twentytwentyfive_child_enqueue_home_v2(): void {
	$relative_path = '/assets/css/home-v2.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-home-v2',
		get_stylesheet_directory_uri() . $relative_path,
		array(),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_home_v2', 50 );

/**
 * Carrega os estilos da página Contactos IPS.
 * Todas as regras estão limitadas à classe .ips-contact-page.
 */
function ips_twentytwentyfive_child_enqueue_contact_page(): void {
	$relative_path = '/assets/css/contactos-v1.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-contact-page',
		get_stylesheet_directory_uri() . $relative_path,
		array(),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_contact_page', 60 );

/**
 * Carrega os estilos da página Sobre IPS.
 * Todas as regras estão limitadas à classe .ips-about-page.
 */
function ips_twentytwentyfive_child_enqueue_about_page(): void {
	$relative_path = '/assets/css/sobre-ines-v1.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-about-page',
		get_stylesheet_directory_uri() . $relative_path,
		array(),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_about_page', 70 );
