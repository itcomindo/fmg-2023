<?php

/**
 * Theme-options.php
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'theme_options_mn');

/**
 * Function Name: theme_options_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function theme_options_mn()
{
	// About Business Start.
	$option_container = Container::make('theme_options', 'Company')
		->set_page_menu_position(5)
		->add_fields(
			array(
				Field::make('text', 'nama_comp_mn', 'Nama Perusahaan'),
				Field::make('textarea', 'alamat_comp_mn', 'Alamat'),
				Field::make('text', 'kota_comp_mn', 'Kota'),
				Field::make('text', 'prov_comp_mn', 'Provinsi'),
				Field::make('text', 'kodepos_comp_mn', 'Kode Pos'),
				Field::make('text', 'telp_comp_mn', 'Telepon Kantor')
					->set_help_text('Ketik: 021-1234567'),
				Field::make('text', 'hp_comp_mn', 'Nomor HP')
					->set_help_text('Ketik: 0812-3456-7890')
					->set_required(true)
					->set_help_text('Ketik: 0812-3456-7890 HANYA SATU NOMOR SAJA!!!'),
				Field::make('text', 'email_comp_mn', 'Email')
					->set_required(true),

				// Kantor Cabang Start.

				Field::make('complex', 'kc_mn', 'Kantor Cabang')
					->set_layout('tabbed-horizontal')
					->add_fields(
						array(
							Field::make('text', 'kota_kc_mn', 'Kota')
								->set_required(true),
							Field::make('textarea', 'alamat_kc_mn', 'Alamat')
								->set_required(true),

						)
					),


				//sedang buka lowongan kerja checkbox.
				Field::make('checkbox', 'sedang_buka_loker', 'Sedang Buka Lowongan Kerja')
					->set_option_value('yes'),

				// Social Media Start.
				Field::make('separator', 'sosmed_sep', 'Social Media')
					->set_classes('separator-custom'),
				Field::make('complex', 'sosmed_mn', 'Social Media')
					->set_layout('tabbed-horizontal')
					->add_fields(
						array(
							Field::make('text', 'sosmed_icon_mn', 'Icon')
								->set_help_text('Ketik: fab fa-facebook-f'),
							Field::make('text', 'sosmed_name_mn', 'Nama Sosial Media')
								->set_required(true),
							Field::make('text', 'sosmed_url_mn', 'URL Sosial Media')
								->set_required(true),
						)
					),

				Field::make('separator', 'testi_sep', 'Testimonials')
					->set_classes('separator-custom'),

				Field::make('complex', 'testimonials', 'Testimonials')
					->set_layout('tabbed-horizontal')
					->add_fields([
						Field::make('checkbox', 'testi_pria', 'Pria')
							->set_option_value('yes')
							->set_default_value(true),
						Field::make('image', 'testi_logo', 'Logo')
							->set_value_type('url'),
						Field::make('text', 'testi_name', 'Nama'),
						Field::make('textarea', 'testi_content', 'Isi Testimonial')
					]),

			)
		);

	// Customer Service Start.

	Container::make('theme_options', 'Customer Service')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('complex', 'cs_comp_mn', 'Customer Service')
					->add_fields(
						array(
							Field::make('radio', 'cs_aktif_mn', 'Aktif?')
								->set_classes('select-horizontal')
								->set_options(
									array(
										'yes' => 'Ya',
										'no'  => 'Tidak',
									)
								),
							Field::make('text', 'nama_cs_mn', 'Nama')
								->set_required(true),
							Field::make('radio', 'tugas_mn', 'Tugas')
								->set_options(
									array(
										'wa'   => 'Terima Chat Whatsapp Saja',
										'call' => 'Terima Telpon Saja',
										'both' => 'Terima Chat Whatsapp & Telpon',
									)
								),
							Field::make('text', 'hp_cs_mn', 'Nomor HP')
								->set_help_text('Ketik: 0812-3456-7890')
								->set_required(true),
						)
					),
			)
		);

	// Bidang Kerja Options Start.
	Container::make('theme_options', 'Bidang Kerja')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('separator', 'bidker_sep', 'Bidang Kerja Outsourcing'),

				// Bidang Kerja Satpam Start.
				Field::make('complex', 'bidker_satpam_mn', 'Bidang Kerja Satpam')
					->set_layout('tabbed-horizontal')
					->add_fields(
						array(
							Field::make('text', 'bidker_satpam_icon_mn', 'Icon')
								->set_help_text('Ketik: fas fa-user-shield'),
							Field::make('text', 'bidker_satpam_title_mn', 'Judul')
								->set_required(true),
							Field::make('rich_text', 'bidker_satpam_desc_mn', 'Deskripsi')
								->set_required(true),
							Field::make('text', 'bidker_satpam_url_mn', 'URL')
								->set_required(true),
						)
					),

				// Bidang Kerja Lainnya.

				Field::make('rich_text', 'bidker_lainnya_mn', 'Bidang Kerja Lainnya')
					->set_help_text('Ketik: <ul><li>Web Development</li><li>Mobile Development</li><li>Desktop Development</li></ul>')
					->set_required(true),

				// Bidang Kerja Didalam Contact Form.

				Field::make('complex', 'bidker_cb_mn', 'Bidang Kerja Didalam Contact Form')
					->add_fields(
						array(
							Field::make('text', 'bidjer_option_id_mn', 'ID')
								// set pattern for the field no spaces, no special characters.
								->set_attribute('pattern', '[a-zA-Z0-9]+')
								->set_help_text('Ketik: tidak boleh ada spasinya, contoh yang benar: webdev')
								->set_required(true),
							Field::make('text', 'bidker_option_mn', 'Judul')
								->set_required(true),
						)
					),
			)
		);

	// Clients.

	Container::make('theme_options', 'Clients')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('separator', 'client_sep', 'Clients'),
				Field::make('complex', 'client_mn', 'Clients')
					->add_fields(
						array(
							Field::make('text', 'client_name_mn', 'Nama Perusahaan Client')
								->set_required(true),
							Field::make('text', 'cleint_location_mn', 'Lokasi Perusahaan Client')
								->set_required(true),
						)
					),
			)
		);

	// Gallery.
	Container::make('theme_options', 'Gallery')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('media_gallery', 'photo_galley_mn', 'Photo Gallery')
					->set_type(array('image')),
			)
		);

	// Menu and Navigation Start.
	Container::make('theme_options', 'Menu')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('text', 'header_menu_id_mn', 'Header Menu'),
			)
		);

	// Menu and Navigation End.

	// Other Settings Start.

	// Map.

	Container::make('theme_options', 'Other Settings')
		->set_page_parent($option_container)
		->add_fields(
			array(
				Field::make('radio', 'ask_seo_mn', 'Aktifkan SEO?')
					->set_classes('select-horizontal')
					->set_options(
						array(
							'yes' => 'Ya',
							'no'  => 'Tidak',
						)
					),
				Field::make('text', 'gmap_key_mn', 'Google Map Key')
					->set_attribute('type', 'password')
					->set_required(true),
				Field::make('map', 'google_map_mn', 'Google Map')
					->set_help_text('Klik pada peta untuk menentukan lokasi'),

			)
		);
}


/**
 * =========================
 * all fields output
 * =========================
 */

/**
 * Function kantor_cabang_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function kantor_cabang()
{
	$cabangs = carbon_get_theme_option('kc_mn');
	if ($cabangs) {
		foreach ($cabangs as $cabang) {
			$kota = $cabang['kota_kc_mn'];
			$alamat = $cabang['alamat_kc_mn'];
?>
			<div class="kc-item">
				<h4 class="kc-kota"><?php echo esc_html($kota); ?></h4>
				<p class="kc-alamat"><?php echo esc_html($alamat); ?></p>
			</div>
<?php
		}
	}
}







/**
 * Function Email
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function email_comp_mn()
{
	echo esc_html(carbon_get_theme_option('email_comp_mn'));
}


/**
 * Function Hp
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function hp_comp_mn()
{
	echo esc_html(carbon_get_theme_option('hp_comp_mn'));
}

/**
 * Function phone_url
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 * @param $what string whatsapp or phone
 */
function mm_the_phone($what)
{
	$phone = esc_html(carbon_get_theme_option('hp_comp_mn'));

	// Menghilangkan karakter non-angka.
	$phone = preg_replace('/\D/', '', $phone);

	// Memastikan nomor telepon dimulai dengan '62'.
	if (substr($phone, 0, 1) === '0') {
		$phone = '62' . substr($phone, 1);
	} elseif (substr($phone, 0, 1) !== '6') {
		$phone = '62' . $phone;
	}

	if ('whatsapp' === $what) {
		echo $phone;
	} elseif ('phone' === $what) {
		echo '+' . $phone;
	} elseif ('display' === $what) {
		echo esc_html(carbon_get_theme_option('hp_comp_mn'));
	}
}



/**
 * Function telpon_comp_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function telpon_comp_mn()
{
	echo esc_html(carbon_get_theme_option('telp_comp_mn'));
}

/**
 * Function Kodepos
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function kodepos_comp_mn()
{
	echo esc_html(carbon_get_theme_option('kodepos_comp_mn'));
}

/**
 * Function Provinsi
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function prov_comp_mn()
{
	echo esc_html(carbon_get_theme_option('prov_comp_mn'));
}

/**
 * Function kota_comp_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function kota_comp_mn()
{
	echo esc_html(carbon_get_theme_option('kota_comp_mn'));
}


/**
 * Function alamat_comp_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function alamat_comp_mn()
{
	echo esc_html(carbon_get_theme_option('alamat_comp_mn'));
}



/**
 * Function Alamat Lengkap
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function alamat_lengkap()
{
	echo esc_html(carbon_get_theme_option('alamat_comp_mn')) . ', ' . esc_html(carbon_get_theme_option('kota_comp_mn')) . ', ' . esc_html(carbon_get_theme_option('prov_comp_mn')) . ' ' . esc_html(carbon_get_theme_option('kodepos_comp_mn'));
}



/**
 * Function nama_comp_mn
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function nama_comp_mn()
{
	echo esc_html(carbon_get_theme_option('nama_comp_mn'));
}
