<?php

/**
 * Template Name: About Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
get_header();
?>

<section id="abu" class="section">
    <div class="container">
        <div id="abu-wr">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php

get_template_part('template-parts/sections/services-section');

get_footer();
