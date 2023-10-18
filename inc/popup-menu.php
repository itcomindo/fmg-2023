<?php

/**
 * Popup Menu
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

?>

<div id="popmenu">
    <div id="popmenu-wr">
        <div id="popmenu-close">X</div>

        <!-- pop menu logo wr -->
        <div id="popmenu-logo-wr" class="popmenu-row">
            <a href="/" title="Fajarmerah Group">
                <img width="60" height="60" src="<?php echo LOGO_60; ?>" alt="Logo Fajarmerah Group" title="Fajarmerah Group">
            </a>
        </div>
        <!-- pop menu top -->
        <div id="popmenu-top" class="popmenu-row">
            <h2 id="popmenu-head" class="section-head-small">Fajarmerah Group</h2>
            <span id="popmenu-alamat"><?php alamat_lengkap(); ?></span>
            <span id="popmenu-phone"><?php mm_the_phone('display') ?></span>
        </div>

        <!--pop menu cta -->
        <div id="popmenu-cta-wr" class="popmenu-row">
            <div id="popmenu-wa-btn" class="popmenu-cta waform-trigger"><i class="fab fa-whatsapp"></i> Chat Dengan Kami</div>
            <div id="popmenu-call-btn" class="popmenu-cta waform-trigger"><i class="fas fa-phone"></i> Hubungi Kami</div>
            <div id="popmenu-email-btn" class="popmenu-cta waform-trigger"><i class="far fa-envelope"></i> Kirirm Email</div>
        </div>

        <!-- pop menu menus -->

        <div id="popmenu-menu-wr" class="popmenu-row">
            <h3 id="popmenu-section-subhead">Informasi & Layanan Kami:</h3>
            <?php mm_popup_menu(); ?>
        </div>



    </div>
</div>