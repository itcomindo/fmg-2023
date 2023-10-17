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
                        <div class="counter-number"><span class="cnum"><?php echo $experience; ?></span> Tahun</div>
                        <div class="counter-description">Sejak Tahun 2000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let counterDone = false;

            function animateCounter(element, start, end, duration) {
                let current = start;
                let increment = end > start ? 1 : -1;
                let stepTime = Math.abs(Math.floor(duration / (end - start)));
                let timer = setInterval(function() {
                    current += increment;
                    element.textContent = current;
                    if (current === end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            }

            function checkCounterVisibility() {
                const counterElement = document.querySelector("#counter");
                const rect = counterElement.getBoundingClientRect();
                const windowHeight = (window.innerHeight || document.documentElement.clientHeight);

                if (rect.top <= windowHeight && rect.bottom >= 0 && !counterDone) {
                    counterDone = true; // Ensure animation is only run once
                    document.querySelectorAll(".cnum").forEach((el) => {
                        const targetNum = parseInt(el.innerText, 10);
                        animateCounter(el, 0, targetNum, 1000); // 2000 ms = 2 seconds
                    });
                }
            }

            window.addEventListener("scroll", checkCounterVisibility);
            checkCounterVisibility(); // Initial check
        });
    </script>
</section>