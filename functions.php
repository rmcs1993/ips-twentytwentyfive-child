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
 * Enqueue dos estilos do child theme.
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
