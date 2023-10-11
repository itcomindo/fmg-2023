<?php

/**
 * Template Name: Landing Video Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
get_header();

// Mendefinisikan array dengan URL video YouTube.
$videos = array(
    'https://www.youtube.com/embed/wdlnPjMXQO8',
    'https://www.youtube.com/embed/wqHKkZJbr4k',
    'https://www.youtube.com/embed/7QDWCRAzUI4',
    'https://www.youtube.com/embed/gZ6OCVWRMso',
    'https://www.youtube.com/embed/PODX_FE8nMs',
    'https://www.youtube.com/embed/ZO6Y-SuCnMc',
    'https://www.youtube.com/embed/7IVP6gH6LPg',
    'https://www.youtube.com/embed/U2qzwwONfS0',
    'https://www.youtube.com/embed/yYv0PUVhlRo',
    'https://www.youtube.com/embed/bBuUwN1fa-Y'
);
?>
<section id="video" class="section">
    <div class="container">
        <div id="video-item-wr">
            <?php
            // Menggunakan foreach untuk mencetak setiap URL dalam div.
            foreach ($videos as $video) {
            ?>
                <div class="video-item" data-video="<?php echo esc_html($video); ?>">
                    <div class="video-iframe-wr">
                        <img src="<?php echo IMAGES_DIR . 'front-pict.webp' ?>" alt="Video Fajarmerah Group">
                        <div class="video-title-wr">
                            <h3 class="video-title">Video Aktivitas Fajarmerah Group</h3>
                        </div>
                    </div>
                </div>
                <div class="video-modal">
                    <div class="video-modal-content">
                        <span class="video-modal-close">&times;</span>
                        <iframe class="video-modal-iframe" src="" allowfullscreen></iframe>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
