<?php

/**
 * Hero Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

$bgimg = get_template_directory_uri() . '/assets/images/mobil-patroli.webp';


defined('ABSPATH') || exit;

?>

<section id="hero" class="section">
	<div id="hero-image-wr" class="section">
		<img width="1920" height="571" src="<?php echo IMAGES_DIR . 'mobil_patroli.webp'; ?>" alt="Outsourcing Security">
	</div>
	<img width="150" height="150" id="hero-mobile-logo" src="<?php echo LOGO; ?>" alt="Outsourcing Security">
	<!-- <i id="hero-overlay"></i> -->
	<div class="container">
		<div id="hero-wr">
			<div id="hero-left" class="hero-col">
				<p class="hero-text-one">FajarMerah Group</p>
				<div class="hero-head-wr">
					<h1 id="hero-head" class="section-head">Perusahaan Outsourcing Indonesia</h1>
				</div>
				<p class="hero-head-text-two">Siap bertugas &amp; menjadikan Anda Sebagai prioritas utama Kami.</p>
			</div>
		</div>
	</div>
</section>