<?php

/**
 * Counter Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
$opening = 2000;
$current_year = date('Y');
$experience = $current_year - $opening;
?>

<section id="counter" class="section">
    <div class="container">
        <div id="counter-wr" class="w100">
            <div id="counter-top" class="section-row counter-row w100">
                <h2 class="section-head-medium red">Perusahaan Outsourcing Terbaik</h2>
                <p class="lw75-mw100">Fajarmerah Group berkomimen penuh dengan secara konsisten menjaga profesionalitas, meningkatkan mutu dan kualitas pekerja diseluruh Indonesia.</p>
            </div>
            <div id="counter-bot" class="section-row counter-row w100">
                <div id="counter-item-wr" class="w100">
                    <div class="counter-item w100">
                        <div class="counter-number"><span class="cnum">3000</span><span>+</span></div>
                        <div class="counter-description">Lebih Staff Aktif</div>
                    </div>
                    <div class="counter-item w100">
                        <div class="counter-number"><span class="cnum">300</span><span>+</span></div>
                        <div class="counter-description">Lebih Rekanan</div>
                    </div>
                    <div class="counter-item w100">
                        <div class="counter-number"><span class="cnum">34</span></div>
                        <div class="counter-description">Provinsi</div>
                    </div>
                    <div class="counter-item w100">
                        <div class="counter-number"><span class="cnum">2000</span></div>
                        <div class="counter-description"><?php echo $experience; ?> Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>