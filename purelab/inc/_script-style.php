<?php
defined( 'ABSPATH' ) || exit;

/**
 * CSS files
 *
 * @add_action
 * @wp_enqueue_scripts
 * @purelab_styles
 */
add_action( 'wp_enqueue_scripts', 'purelab_styles' );
function purelab_styles() {
	/**
	 * Enqueue Style
	 *
	 * @wp_enqueue_style
	 */
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', [], null );
	wp_enqueue_style( 'fonts-manrope-purelab', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', [], null );
	wp_enqueue_style( 'bundle-purelab', TEMPLATE_PATH . '/assets/css/bundle.css', ['bootstrap'], '1.2.6' );

}

/**
 * JS files
 *
 * @add_action
 * @wp_enqueue_scripts
 * @purelab_scripts
 */
add_action( 'wp_enqueue_scripts', 'purelab_scripts' );
function purelab_scripts() {

	/**
	 * Jquery
	 */

	wp_register_script( 'jquery',  'https://code.jquery.com/jquery-3.6.0.min.js', false, '3.4.2', false );
	wp_enqueue_script( 'jquery' );

	/**
	 * Enqueue Script
	 *
	 * @wp_enqueue_script
	 */
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', [ 'jquery' ], '3.4.2', true );
	wp_enqueue_script( 'contact-form',
		get_template_directory_uri() . '/assets/js/contact-form.js',
		array(), '', true );
}
