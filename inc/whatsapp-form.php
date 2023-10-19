<?php

/**
 * Whatsapp Form
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


/**
 * Function mm_wa_form
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_wa_form()
{
    $loker = carbon_get_theme_option('sedang_buka_loker');
    if ($loker) {
        $loker = 'data-loker="yes"';
    } else {
        $loker = 'data-loker="no"';
    }
?>
    <div id="waform" class="section">
        <div id="waform-wr">
            <div id="waform-cancel">X</div>
            <div id="waform-option">
                <div id="waform-head-wr">
                    <h3 id="waform-head">Contact Us</h3>
                    <span id="waform-desc">Isi form dibawah ini sebelum memulai chat dengan kami 👌.</span>
                </div>
                <div id="waform-option-elements-wr" class="animate__animated">
                    <div id="open-chat" class="waform-cta-element">Chat</div>
                    <a id="ctacall" class="waform-link waform-cta-element" rel="noopener" target="_blank" href="tel:<?php mm_the_phone('phone') ?>"> Call</a>
                    <a id="ctaemail" class="waform-link waform-cta-element" rel="noopener" target="_blank" href="mailto:<?php email_comp_mn(); ?>"> Email</a>
                </div>
            </div>
            <div id="waform-item-wr" <?php echo $loker; ?>>
                <div id="waform-close">Close</div>
                <!-- nama -->
                <div id="kotak-isi-nama" class="waform-item">
                    <label class="waform-label" for="nama">Nama<span class="red">*</span></label>
                    <input class="waform-element" type="nama" id="nama">
                </div>
                <!-- keperluan -->
                <div class="waform-item">
                    <label for="keperluan">Informasi Tentang:</label>
                    <select name="keperluan" id="keperluan">
                        <option value="pilih" disabled>Silahkan Pilih</option>
                        <option value="Pelatihan Satpam">Pelatihan Satpam</option>
                        <option value="Jasa Satpam">Jasa Satpam</option>
                        <option value="Jasa Bodyguard">Jasa Bodyguard</option>
                        <option value="Jasa Pengamanan Event">Jasa Pengamanan Event</option>
                        <option value="Jasa Pengawalan Uang">Jasa Pengawalan Uang</option>
                        <option value="Sewa Tempat Training Center Satpam">Sewa Tempat Training Center Satpam</option>
                        <option value="Outsourcing Lainnya">Outsourcing Lainnya</option>
                        <option value="Lowongan Kerja">Lowongan Kerja</option>
                    </select>
                    <span id="loker-yes" style="display:none;">Jelaskan pendidikan dan lokasi Anda sekarang 🙏</span>
                    <span id="loker-no" style="display:none;">Maaf belum ada lowongan kerja 🙏</span>
                </div>
                <div id="kotak-isi-pesan" class="waform-item">
                    <label for="isipesan">Tuliskan Pesan:<span class="red">*</span></label>
                    <textarea name="isipesan" id="isipesan" cols="30" rows="5"></textarea>
                </div>
                <div id="tombol-kirim-pesan" class="waform-item" data-whatsapp="//api.whatsapp.com/send?phone=<?php mm_the_phone('whatsapp'); ?>">
                    <small id="btn-msg" class="accent-1">Silahkan Tekan tombol chat 🙏</small>
                    <button id="waform-submit"><a href="#"> Mulai Chat</a></button>
                </div>
            </div>
        </div>
    </div>
<?php
}
add_action('wp_footer', 'mm_wa_form');


add_action('wp_footer', function () {
    $pass = array('span', 'img');
?>
    <div id="fwa" class="waform-trigger animate__animated animate__backInUp">
        <div id="before-open" class="fwa-greeting animate__animated animate__rubberBand animate__delay-1s"><?php mm_greeting(); ?> 🙏 Silahkan tekan disini untuk menghubungi kami 👌.</div>
        <div id="fwa-wr">
            <img src="<?php echo LOGO; ?>" alt="PT. Fajarmerah Group">
        </div>
    </div>
<?php
});



function mm_greeting()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $jam = $date->format('H');
    if ($jam >= 0 && $jam <= 11) {
        echo '<span>Selamat Pagi</span>';
    } elseif ($jam >= 12 && $jam <= 14) {
        echo '<span>Selamat Siang</span>';
    } elseif ($jam >= 15 && $jam <= 18) {
        echo '<span>Selamat Sore</span>';
    } elseif ($jam >= 19 && $jam <= 24) {
        echo '<span>Selamat Malam</span>';
    }
}
