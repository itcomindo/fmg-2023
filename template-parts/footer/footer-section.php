<?php

/**
 * Footer Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


get_template_part('inc/popup-menu');


?>

<footer id="footer" class="section">
    <div class="container">

        <!-- footer top -->
        <div class="footop">
            <div class="footop-inner">

                <span class="logo-80"><img src="<?php echo LOGO_80; ?>" alt="PT. Fajarmerah Indo Service" title="PT. Fajarmerah Indo Service" width="80" height="80"></span>
            </div>
            <!-- logo_dynamic_mn('class-str', 'width-int'); -->
        </div>


        <!-- footer bottom -->
        <div class="foobot">

            <!-- footer left start-->
            <div class="footbot-left">
                <h2 class="foothead">Kantor Pusat</h2>
                <ul class="vertical">
                    <li class="colist-item">
                        <span class="colist-left"><img width="16" height="16" src="<?php echo LOGO_16; ?>" alt="PT. Fajarmerah Indo Service Security" title="PT. Fajarmerah Indo Service Security"></span>
                        <span class="colist-right"><?php nama_comp_mn(); ?></span>
                    </li>

                    <li class="colist-item">
                        <span class="colist-left"><i class="fa-regular fa-bookmark"></i></span>
                        <span class="colist-right"><?php alamat_lengkap(); ?></span>
                    </li>


                    <li class="colist-item">
                        <span class="colist-left"><i class="fa-solid fa-phone"></i></span>
                        <span id="jqhp" class="colist-right jqnhp"><?php mm_the_phone('display'); ?></span>
                    </li>

                    <li class="colist-item">
                        <span class="colist-left"><i class="fa-brands fa-whatsapp"></i></span>
                        <span class="colist-right"><?php mm_the_phone('display'); ?></span>
                    </li>

                    <li class="colist-item">
                        <span class="colist-left"><i class="fa-regular fa-envelope"></i></span>
                        <span class="colist-right"><?php email_comp_mn(); ?></span>
                    </li>

                </ul>
            </div>
            <!-- footer left end -->


            <!-- footer right start-->
            <div class="footbot-right">
                <h3 class="foothead">Kantor Cabang &amp; Perwakilan</h3>

                <div class="kc-wr">
                    <?php kantor_cabang(); ?>
                </div>

            </div>
            <!-- footer right end -->
        </div>
    </div>
</footer>

<div id="cp" class="section">
    <div class="container">
        <div id="cp-wr">
            <span>Web Design by Budiharyono.com</span>
        </div>
    </div>
</div>