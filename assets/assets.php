<?php

/**
 * Assets
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

/**
 * Function mm_theme_version
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_theme_version()
{
	$theme_version = wp_get_theme()->get('Version');
	return $theme_version;
}

require get_template_directory() . '/assets/images/images.php';
require get_template_directory() . '/assets/videos/video.php';


/**
 * Function Name: mm_enqueue_styles
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_enqueue_styles()
{
	$theme_version = wp_get_theme()->get('Version');

	// Load Normalize CSS.
	wp_enqueue_style('mm-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1', 'all');

	// Load Font Awesome CSS.
	wp_enqueue_style('mm-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '6.2.0', 'all');

	// Load Animate CSS.
	wp_enqueue_style('mm-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all');

	if (mm_is_devmode()) {
		// Load your main style.css file.
		wp_enqueue_style('mm-style', get_stylesheet_uri(), array('mm-normalize', 'mm-fontawesome', 'mm-animate'), $theme_version, 'all');
	} else {
		// Load a minified version of your style.css.
		wp_enqueue_style('mm-style', get_template_directory_uri() . '/style.min.css', array('mm-normalize', 'mm-fontawesome', 'mm-animate'), $theme_version, 'all');
	}

	if (is_front_page() || is_home()) {
		// Load Flickity CSS on the front page or home page only.
		wp_enqueue_style('mm-flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), '2.2.2', 'all');
	}
}
add_action('wp_enqueue_scripts', 'mm_enqueue_styles');



/**
 * Function enqueue style and script
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_load_scripts()
{
	// Deregister the default WordPress jQuery.
	wp_deregister_script('jquery');

	// Enqueue jQuery from Google CDN.
	wp_enqueue_script('mm-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);

	if (is_front_page()) {
		// Enqueue Flickity JS only on the front page.
		wp_enqueue_script('mm-flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), '2.2.2', true);
	}

	if (mm_is_devmode()) {
		// Enqueue your main global.js file.
		wp_enqueue_script('mm-global-js', get_template_directory_uri() . '/assets/js/global.js', array('mm-jquery'), mm_theme_version(), true);
	} else {
		// Enqueue a minified version of your global.js.
		wp_enqueue_script('mm-global-js', get_template_directory_uri() . '/assets/js/global.min.js', array('mm-jquery'), mm_theme_version(), true);
	}
}
add_action('wp_enqueue_scripts', 'mm_load_scripts');



/**
 * Function Name: mm_admin_scripts
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_admin_scripts()
{
	wp_enqueue_style('mm-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), mm_theme_version(), 'all');
}
add_action('admin_enqueue_scripts', 'mm_admin_scripts');
