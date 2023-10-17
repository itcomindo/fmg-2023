<?php

/**
 * Template Name: Lahan Pelatihan Security
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();

?>

<section id="sewa" class="section">
    <div class="container">
        <div id="sewa-hero">
            <div id="sewa-hero-left">
                <h1 class="section-head"><?php the_title(); ?></h1>
                <span>Fajarmerah Group menyewakan lahan lengkap dengan fasilitas untuk menunjang kegiatan pelatihan satpam yang berlokasi di DKI Jakarta.</span>
            </div>
            <div id="sewa-hero-right">
                <video autoplay muted playsinline loop>
                    <source src="<?php echo esc_url(MM_VIDEO_DIR . 'apel.mp4'); ?>" type="video/mp4">
                </video>
            </div>

        </div>
    </div>
</section>


<section id="sewa-content" class="section">
    <div class="container">
        <div id="sewa-content-wr">
            <h2 class="section-head-medium">Sewa Lahan Tempat Latihan Satpam Jakarta</h2>
            <p>Fajarmerah Group memiliki lahan yang luas untuk menunjang aktivitas pelatihan satpam yang ingin Anda lakukan. Lokasi penyewaan lahan latihan satpam ini berada di Jakarta Selatan DKI Jakarta.</p>
            <p>Fasilitas yang tersedia antara lain adalah:</p>
            <ul>
                <li>Lapangan</li>
                <li>Barak/mess</li>
                <li>Ruangan Aula</li>
                <li>Beserta seluruh fasilitas penunjang terkait dengannya</li>
            </ul>

            <p>Informasi lebih lengkap tentang penawaran <?php the_title(); ?> ini silahkan hubungi marketing Fajarmerah Group dinomor telepon: <?php mm_the_phone('display'); ?></p>




        </div>
    </div>
</section>


<?php

get_footer();
