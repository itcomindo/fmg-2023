<?php

/**
 * Template Name: Client Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


get_header();
?>
<section id="client" class="section">
    <div class="container">
        <div id="client-wr">
            <?php
            get_template_part('template-parts/components/clients-table');
            ?>
        </div>
    </div>
</section>

<?php

get_footer();
