<?php

/**
 * Menus
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


/**
 * Function register: header and footer menu
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_register_menus()
{
    register_nav_menus([
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu'
    ]);
}
add_action('init', 'mm_register_menus');

/**
 * Function header menu
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_header_menu()
{
    wp_nav_menu([
        'theme_location' => 'header-menu',
        'menu_id' => 'header-menu-list',
        'item_class' => 'header-menu-item',
    ]);
}

function mm_tambahkan_class_pada_menu_li($classes, $item, $args)
{
    if ('header-menu' == $args->theme_location) { // Sesuai dengan 'theme_location' pada fungsi Anda.
        $classes[] = 'header-menu-item'; // ganti 'kelas_baru_anda' dengan nama kelas yang Anda inginkan.
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'mm_tambahkan_class_pada_menu_li', 10, 3);
