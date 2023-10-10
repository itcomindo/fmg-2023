<?php

/**
 * Page Template
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
get_header();
?>

<section id="the-page" class="section">
    <div class="container">
        <div id="page-wr">
            <?php the_title('<h1>', '</h1>') ?>
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
get_footer();
