<?php

/**
 * Functions
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


/**
 * Function crb_load
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function crb_load()
{
	require_once 'vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme', 'crb_load');



/**
 * Function is_devmode
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_is_devmode()
{
	// Cek apakah $_SERVER['REMOTE_ADDR'] tersedia sebelum membandingkannya.
	if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'), true)) {
		return true;
	}
	return false;
}




/**
 * Function mah
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 * @param array $html_tags_allowed Array of HTML tags allowed.
 */
function mah($html_tags_allowed = array())
{
	$pass = array();

	// Definisikan atribut untuk SVG.
	$svg_args = array(
		'class'             => true,
		'aria-hidden'       => true,
		'aria-labelledby'   => true,
		'role'              => true,
		'xmlns'             => true,
		'width'             => true,
		'height'            => true,
		'viewBox'           => true, // Perbaiki casing di sini.
		'version'           => true,
		'xmlns:xlink'       => true,
		'x'                 => true,
		'y'                 => true,
		'enable-background' => true,
		'xml:space'         => true,
		'metadata'          => true,
		'fill' 				=> true,
		'style' 			=> true,
		'path' 				=> true,
		'd' 				=> true,

	);

	foreach ($html_tags_allowed as $tag) {
		$attributes = array(
			'class' => array(),
			'id'    => array(), // Tambahkan atribut id.
		);

		// Tambahkan atribut tambahan untuk tag spesifik.
		if ('img' === $tag) {
			$attributes['src']    = array();
			$attributes['alt']    = array();
			$attributes['title']  = array();
			$attributes['width']  = array();
			$attributes['height'] = array();
		}

		if ('a' === $tag) {
			$attributes['href']   = array();
			$attributes['target'] = array();
			$attributes['rel']    = array();
			$attributes['style']  = array();
			$attributes['class']  = array();
		}

		// Jika tag adalah SVG, gunakan atribut yang telah didefinisikan dalam $svg_args.
		if ('svg' === $tag) {
			$attributes = $svg_args;
		}

		// iframe.
		if ('iframe' === $tag) {
			$attributes['src']             = true;
			$attributes['width']           = true;
			$attributes['height']          = true;
			$attributes['frameborder']     = true;
			$attributes['allowfullscreen'] = true;
		}

		// Jika tag adalah div, tambahkan atribut data-xxxx dengan validasi nilai hex.
		if ('div' === $tag) {
			$attributes = array_merge(
				$attributes,
				array(
					'/^data-[a-zA-Z0-9\-]*$/' => array(
						'pattern' => '/^#[a-fA-F0-9]{6}$/',
					),
				)
			);
		}

		$pass[$tag] = $attributes;
	}

	// Tambahkan elemen lain yang diperlukan untuk SVG.
	$pass['g']     = array('fill' => true);
	$pass['title'] = array('title' => true);
	$pass['path']  = array(
		'd'    => true,
		'fill' => true,
	);

	return $pass;
}




// add theme support.
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');

// disable gutenberg.
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 *=========================
 * remove any unecessary code, scripts, and styles
 *=========================
 */

// Remove emoji.
add_filter(
	'the_generator',
	function () {
		return '';
	}
);

/**
 * Function remove wp-embed
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
add_action(
	'wp_footer',
	function () {
		wp_deregister_script('wp-embed');
	}
);

/**
 * Remove action wp_head.
 *
 * @package MonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 001
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Remove jquery migrate
 *
 * @package MonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 001
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style('wp-block-library');
	}
);

/**
 * Function Name: mm_remove_jquery_migrate
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
add_action(
	'wp_default_scripts',
	function ($scripts) {
		if (!is_admin() && isset($scripts->registered['jquery'])) {
			$script = $scripts->registered['jquery'];
			if ($script->deps) {
				$script->deps = array_diff(
					$script->deps,
					array(
						'jquery-migrate',
					)
				);
			}
		}
	}
);

// remove feed links from wp_head.
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// remove wlwmanifest link.
remove_action('wp_head', 'wlwmanifest_link');

// remove rsd link.
remove_action('wp_head', 'rsd_link');

// remove shortlink.
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * Function Disable Feed
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_disable_feed()
{
	$message = sprintf(
		/* translators: %s: homepage URL */
		esc_html__('No feed available, please visit our <a href="%s">homepage</a>!', 'text-domain'),
		esc_url(home_url('/'))
	);

	wp_die(wp_kses($message, array('a' => array('href' => array()))));
}


// Menonaktifkan feed untuk post.
add_action('do_feed', 'mm_disable_feed', 1);
add_action('do_feed_rdf', 'mm_disable_feed', 1);
add_action('do_feed_rss', 'mm_disable_feed', 1);
add_action('do_feed_rss2', 'mm_disable_feed', 1);
add_action('do_feed_atom', 'mm_disable_feed', 1);
add_action('do_feed_rss2_comments', 'mm_disable_feed', 1);
add_action('do_feed_atom_comments', 'mm_disable_feed', 1);

// Menonaktifkan feed untuk kategori, tag, dan author.
add_filter('feed_links_show_category_feed', '__return_false');
add_filter('feed_links_show_author_feed', '__return_false');
add_filter('feed_links_show_comments_feed', '__return_false');






require_once get_template_directory() . '/inc/inc.php';
require_once get_template_directory() . '/assets/assets.php';
require_once get_template_directory() . '/plugins/plugins.php';
