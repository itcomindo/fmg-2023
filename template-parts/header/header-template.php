<?php

/**
 * Header Template
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;
$pass = array('svg', 'img');

?>


<div id="stmenu" class="section">
	<div class="container">
		<div id="stmenu-wr">
			<div id="stmenu-trigger">
				<img width="80" height="80" src="<?php echo LOGO_80; ?>" alt="Fajarmerah Group" title="Fajarmreah Group">
			</div>
		</div>
	</div>
</div>

<div id="topbar" class="section">
	<div class="container">
		<div id="topbar-wr">
			<div id="tb-left">
				<span class="show-on-large"><?php nama_comp_mn(); ?></span>
				<span class="show-on-small">PT. FISS</span>
			</div>
			<div id="tb-right"><?php echo wp_kses(mm_icon_whatsapp('ffffff'), mah($pass)); ?><?php echo wp_kses(mm_icon_phone('ffffff'), mah($pass)); ?> <?php hp_comp_mn(); ?></div>
		</div>
	</div>
</div>

<header id="header" class="section">
	<div class="container">
		<div id="header-wr">
			<div id="header-left" class="header-col">
				<div id="text-rotator-container">
					<div class="rotating-text">Security training</div>
					<div class="rotating-text hide">Security outsourcing</div>
					<div class="rotating-text hide">Security consultant</div>
					<div class="rotating-text hide">Manpower agency</div>
				</div>
			</div>
			<div id="header-mid" class="header-col">
				<a href="/" title="<?php nama_comp_mn(); ?>">
					<img src="<?php echo LOGO_80; ?>" alt="<?php nama_comp_mn(); ?>" title="<?php nama_comp_mn(); ?>" width="80" height="80">
				</a>
				<h2 id="logo-header">Fajarmerah Group</h2>
			</div>
			<div id="header-right" class="header-col">Legal & Certified</div>
		</div>
	</div>
</header>
<div id="header-menu" class="section">
	<div class="container">
		<div id="header-menu-wr">
			<?php mm_header_menu(); ?>
			<div id="popup-menu-trigger-wr">
				<!-- <i class="fas fa-bars"></i> -->
				<?php echo mm_icon_bars(); ?>
			</div>
		</div>
	</div>
</div>