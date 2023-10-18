<?php

/**
 * About Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
?>

<section id="about" class="section">
    <div class="container">
        <div id="about-wr" class="w100">
            <div id="about-left" class="w100">
                <h2 class="section-head font-display">Tentang PT. FMG</h2>
                <div class="about-text-wr w100">
                    <p class="about-text"><span class="atnum">1.</span> PT. Fajarmerah Indoservice perusahaan outsourcing besar &amp; mapan di Indonesia. <span class="white bold">Kami menyediakan tenaga kerja dengan attitude dan mental yang baik, terdidik, terlatih, berpengalaman dan bersemangat untuk bekerja dan ditempatkan diseluruh Indonesia.</span></p>

                    <p class="about-text"><span class="atnum">2.</span> PT. Fajarmerah Indosevice <span class="white bold"> berhasil mengelola lebih dari 3000 tenaga kerja yang di tempatkan di 34 provinsi dan di lebih dari 300 perusahaan, fasilitas pemerintahan, hotel, apartemen, restoran, rumah sakit, kantor duta besar, fasilitas pendidikan, real estate, pengamanan personal dst</span>.</p>

                    <p class="about-text"><span class="atnum">3.</span> <span class="white bold">Kami sangat fokus pada efisiensi dan efektifitas tanpa mengurangi kualitas dan produktivitas</span> setiap tenaga kerja yang Kami tugaskan dilokasi area bisnis Anda.</p>

                    <p class="about-text"><span class="atnum">4.</span> <span class="white bold">Kami sangat memahami ekspektasi yang Anda targetkan,</span> konsultasikan segala kebutuhan Anda bersama Kami, segera hubungi layanan pelanggan Kami diwaktu yang paling nyaman yang Anda miliki melalui: <span class="cta-wr"><a href="https://api.whatsapp.com/send?phone=<?php mm_the_phone('whatsapp'); ?>" class="cta-phone-chat-mn chat"><i class="fab fa-whatsapp"></i> <?php mm_the_phone('display'); ?></a><a href="tel:<?php mm_the_phone('phone'); ?>" class="cta-phone-chat-mn phone"><i class="fa-solid fa-phone"></i> <?php mm_the_phone('display'); ?></a></span></p>
                </div>
            </div>
            <div id="about-right" class="w100">
                <div class="arleft">
                    <img id="mancall" src="<?php echo STANDING_OFFICER; ?>" alt="Jasa Satpam">
                    <span class="ab-logo"><img src="<?php echo LOGO_32; ?>" alt="PT. Fajarmerah Indo Service" title="PT. Fajarmerah Indo Service" width="32" height="32"></span>
                </div>
                <div class="arright">
                    <ul>
                        <li class="standing-officer">Standing Officer</li>
                        <li class="emergency-issue"><span class="callus">Call Us 24/7 For Emergency Issue on</span> <span class="abnohp"><?php mm_the_phone('display'); ?></span></li>
                    </ul>
                    <div id="abbtn" class="global-btn waform-trigger cursor-pointer">Contact</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
