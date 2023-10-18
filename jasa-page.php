<?php

/**
 * Template Name: Jasa
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();

?>

<section id="jp" class="section">
    <div class="container">
        <div id="jp-wr">
            <?php the_title('<h1>', '</h1>'); ?>
            <p>Fajarmerah Group menyediakan <?php the_title(); ?> di Indonesia. Perusahaan kami adalah perusahaan legal, bersertifikat dan terdaftar di Indonesia. Kami menyediakan <?php the_title(); ?> untuk semua jenis bisnis. Kami memiliki pengalaman lebih dari 10 tahun dalam bidang <?php the_title(); ?>. Kami memiliki tim profesional yang siap membantu Anda.</p>

            <p>Fajarmerah Group didukung oleh sumber daya manusia yang handal dan berkualitas. Beratitude baik, berpendidikan, memiliki skill, siap kerja, loyal dan berdedikasi tinggi dan konsisten. Perusahaan ini juga dikelola secara profesional oleh orang-orang yang sangat berkompeten dibidang ketenagakerjaan.</p>

            <p>Khusus untuk <?php the_title(); ?> kami tersedia diseluruh Indonesia. Untuk Anda yang ingin informasi lebih lengkap tentang <?php the_title(); ?> silahkan hubungi kami dinomor telepon <?php hp_comp_mn(); ?></p>
        </div>
    </div>
</section>

<?php
get_template_part('template-parts/sections/services-section');
get_template_part('template-parts/sections/counter-section');
get_template_part('template-parts/sections/rekanan-section');

get_footer();
