<?php

/**
 * Template Name: Loker Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();


echo '<section id="loker" class="section">';
echo '<div class="container">';
echo '<div id="loker-wr">';
echo '<h1 class="section-title">Lowongan Pekerjaan Fajarmerah Group</h1>';
echo '<p class="section-desc">Berikut adalah daftar lowongan pekerjaan yang tersedia di Fajarmerah Group.</p>';
echo '<div id="loker-item-wr">';

$args = [
    'post_type' => 'post',
    'category_name' => 'loker',
    'posts_per_page' => 10,
];

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
?>
        <div class="loker-item">
            <?php mm_loker_date('tanggal'); ?>
            <div class="loker-item-top">
                <img src="<?php echo LOGO; ?>" alt="Logo Fajarmerah Group">
            </div>
            <div class="loker-item-bot">
                <h3><?php the_title(); ?></h3>


                <?php mm_loker_date('button open'); ?>
                <?php mm_loker_date('button close'); ?>

            </div>
        </div>
<?php
    }
} else {
    echo '<h2>Maaaf, belum ada lowongan pekerjaan</h2>';
    echo '<span>Silahkan cek kembali nanti 🙏.</span>';
}

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';




get_footer();
