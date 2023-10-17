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
        </div>
    </div>
</section>
<?php

get_footer();
