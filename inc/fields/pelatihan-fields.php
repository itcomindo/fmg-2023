<?php

/**
 * Pelatihan Fields
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 * Function mm_pelatihan_fields
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_pelatihan_fields()
{
    Container::make('post_meta', 'Pelatihan')
        ->where('post_type', '=', 'page')
        // post template is pelatihan-page
        ->where('post_template', '=', 'pelatihan-page.php')
        ->add_fields([
            Field::make('date', 'tanggal_mulai', 'Tanggal Mulai Pelatihan')
                ->set_storage_format('d-F-Y'),
            Field::make('date', 'tanggal_akhir', 'Tanggal Akhir Pelatihan')
                ->set_storage_format('d-F-Y'),
            Field::make('textarea', 'lokasi_pelatihan', 'Lokasi Pelatihan'),
            Field::make('rich_text', 'persyaratan', 'Persyaratan Ikut Pelatihan'),
            Field::make('rich_text', 'fasilitas', 'Fasilitas Ikut Pelatihan'),
            Field::make('rich_text', 'biaya_pelatihan', 'Biaya Ikut Pelatihan'),
            Field::make('complex', 'contact_person_pelatihan', 'Contact Person Pelatihan')
                ->add_fields([
                    Field::make('text', 'cp_name', 'Nama'),
                    Field::make('text', 'cp_phone', 'Phone'),
                    Field::make('text', 'cp_whatsapp', 'Whatsapp')
                ]),
        ]);
}
add_action('carbon_fields_register_fields', 'mm_pelatihan_fields');


/**
 * Function Translate Bulan
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_translate_bulan($bulan)
{
    $months = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];

    // Cek apakah nama bulan dalam bahasa Inggris ada di array, jika ya, kembalikan nama bulannya dalam bahasa Indonesia
    return isset($months[$bulan]) ? $months[$bulan] : $bulan;
}

/**
 * Function Eksplorasi Tanggal Mulai
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_tanggal_mulai()
{
    $tanggal = carbon_get_the_post_meta('tanggal_mulai'); // Misal output: 10-January-2023

    // Pisahkan tanggal berdasarkan tanda "-" untuk mendapatkan nama bulannya
    $parts = explode('-', $tanggal);
    $bulan = $parts[1];

    // Terjemahkan nama bulannya
    $bulan_indonesia = mm_translate_bulan($bulan);

    // Gabungkan kembali tanggalnya
    $tanggal_indonesia = $parts[0] . '-' . $bulan_indonesia . '-' . $parts[2];

    return $tanggal_indonesia; // Hasil: 10-Januari-2023
}


/**
 * Function Eksplorasi Tanggal akhir
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_tanggal_akhir()
{
    $tanggal = carbon_get_the_post_meta('tanggal_akhir'); // Misal output: 10-January-2023

    // Pisahkan tanggal berdasarkan tanda "-" untuk mendapatkan nama bulannya
    $parts = explode('-', $tanggal);
    $bulan = $parts[1];

    // Terjemahkan nama bulannya
    $bulan_indonesia = mm_translate_bulan($bulan);

    // Gabungkan kembali tanggalnya
    $tanggal_indonesia = $parts[0] . '-' . $bulan_indonesia . '-' . $parts[2];

    return $tanggal_indonesia; // Hasil: 10-Januari-2023
}
