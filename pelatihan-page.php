<?php

/**
 * Pelatihan Page
 * 
 * template name: Pelatihan Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();
?>
<section id="pelatihan" class="section">
    <div class="container">
        <div id="pelatihan-wr">
            <?php the_title('<h1>', '</1h1>') ?>
            <?php echo mm_tanggal_mulai(); ?>
            <?php echo mm_tanggal_akhir(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
