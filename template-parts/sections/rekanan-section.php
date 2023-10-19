<?php

/**
 * Rekanan Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

function mm_ambil_gambar_rekanan()
{
    // Direktori target.
    $dir = WP_CONTENT_DIR . '/uploads/rekanan/*.webp';

    // Mengambil semua file .webp dari direktori target.
    $files = glob($dir);

    $output = ''; // Output string untuk menyimpan hasil

    // Jika ada file yang ditemukan.
    if (!empty($files)) {
        $x = 0;
        foreach ($files as $file) {
            $x++;
            // Mendapatkan URL file berdasarkan path absolutnya.
            $file_url = content_url('/uploads/rekanan/' . basename($file));

            $output .= '<div class="rekanan-item">';
            $output .= '<img width="96" height="36" class="rekanan-img" src="' . esc_url($file_url) . '" alt="client perusahaan outsourcing PT. FMG ke ' . $x . ' " title="client perusahaan outsourcing PT. FMG ke ' . $x . ' ">';
            $output .= '</div>';
        }
    }

    return $output;
}

// Untuk menampilkan gambar-gambar tersebut, Anda bisa memanggil:.
// echo mm_ambil_gambar_rekanan();.


?>

<section id="rekanan" class="section">
    <div class="custom-shape-divider-top-1697101228">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container">
        <div id="rekanan-item-wr" class="w100">
            <?php echo mm_ambil_gambar_rekanan(); ?>
        </div>
    </div>
</section>