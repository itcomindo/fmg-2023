<?php

/**
 * 404 page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
get_header();
?>

<section id="page404" class="section">
    <div class="container">
        <div id="page404-wr">
            <div id="imgwr"><img src="<?php echo get_template_directory_uri() . '/assets/images/search.png'; ?>" alt="404"></div>
            <h1>Ups! maaf tidak menemukan yang Anda Cari?</h1>
            <span>Yuk tanya admin, kami siap membantu Anda memberikan solusi yang pasti Anda sukai 😊</span>
        </div>
    </div>
</section>


<?php


get_template_part('/template-parts/sections/cta-section');


add_action('wp_footer', function () {

?>
    <style>
        #page404 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        #page404-wr {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #imgwr {
            width: 300px;
            height: 300px;
            overflow: hidden;
        }

        #imgwr img {
            width: 100%;
            height: auto;
        }
    </style>
<?php

});


get_footer();
