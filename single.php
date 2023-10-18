<?php

/**
 * Single
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();

?>
<section id="single" class="section">
    <div class="container">
        <div id="single-wr">
            <h1><?php the_title(); ?></h1>
            <div id="the-content">
                <?php the_content(); ?>
            </div>
            <?php
            if (mm_get_loker_expired_date()) {
                if (has_term('Loker', 'category')) {
            ?>
                    <div class="lcp-wr">
                        <div id="lcp-top">
                            <h3>Informasi lebih lanjut hubungi</h3>
                            <div id="lcp-item-wr">
                                <?php loker_contact_person(); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<h2>Lowongan pekerjaan ini sudah ditutup</h2>';
                echo '<span>Terima kasih atas partisipasinya.</span>';
            }
            ?>
        </div>
    </div>
</section>
<?php






get_footer();
