<?php

/**
 * Front Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
$pass = array('img');
get_header();
get_template_part('template-parts/sections/hero-section');
get_template_part('template-parts/sections/services-section');
// get_template_part('template-parts/sections/counter-section');.
// get_template_part('template-parts/sections/rekanan-section');.
// get_template_part('template-parts/sections/about-section');.
get_footer();
