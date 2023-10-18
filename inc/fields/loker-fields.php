<?php

/**
 * Loker Fields
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function loker_fields()
{
    Container::make('post_meta', 'Loker')
        ->where('post_type', '=', 'post')
        ->where('post_term', '=', array(
            'field' => 'slug',
            'value' => 'loker',
            'taxonomy' => 'category',
        ))
        ->add_fields([
            // date close
            Field::make('date', 'date_loker_expired', 'Loker Expired Date')
                ->set_storage_format('d-F-Y'),
            //contact person
            Field::make('complex', 'loker_contact_person', 'Contact Person')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'loker_contact_person_name', 'Contact Person Name')
                        ->set_help_text('Masukkan nama contact person, misal: Budi Haryono'),
                    //contact person phone
                    Field::make('text', 'loker_contact_person_phone', 'Contact Person Phone')
                        ->set_help_text('Masukkan nomor telepon contact person, misal: 0813-9891-2341'),
                    //contact person whatsapp
                    Field::make('text', 'loker_contact_person_whatsapp', 'Contact Person Whatsapp')
                        ->set_help_text('Masukkan nomor telepon contact person, misal: 0813-9891-2341'),
                ]),
        ]);
}
add_action('carbon_fields_register_fields', 'loker_fields');


function loker_contact_person()
{
    $lcps = carbon_get_post_meta(get_the_ID(), 'loker_contact_person');
    if ($lcps) {
        echo '<div id="lcp-list-wr">';
        foreach ($lcps as $lcp) {

            //post title
            $title = get_the_title();
            if ($title) {
                $title = str_replace(' ', '%20', $title);
            }



            //nama
            $nama = $lcp['loker_contact_person_name'];
            if ($nama) {
                $pesan_wa = str_replace(' ', '%20', $nama);
                $pesan_wa = 'Halo%20' . $pesan_wa . ',%20saya%20ingin%20melamar%20kerja%20sesuai%20dengan%20' . $title . '.%20Apakah%20masih%20tersedia?%20terima%20kasih.';
            }

            //phone url
            $phone = $lcp['loker_contact_person_phone'];
            if ($phone) {
                $phone = 'tel:+' . substr_replace($phone, '62', 0, 1);
                $phone = str_replace('-', '', $phone);
                $phone = str_replace(' ', '', $phone);
                $phone = '<div class="lcp-list-phone"><a href="' . $phone . '"><i class="fas fa-phone"></i> Hubungi Telepon Bpk/Ibu ' . $nama . '</a></div>';
            } else {
                $phone = '';
            }

            //whatsapp url
            $wa = $lcp['loker_contact_person_whatsapp'];
            if ($wa) {
                $wa = '//api-whatsapp.com/send?phone=' . substr_replace($wa, '62', 0, 1);
                $wa = str_replace('-', '', $wa);
                $wa = str_replace(' ', '', $wa);
                $wa = '<div class="lcp-list-whatsapp"><a title="Chat Admin loker Fajarmerah Group" href="' . $wa . '&text=' . $pesan_wa . '" rel="noopener" target="_blank"><i class="fab fa-whatsapp"></i> Chat Dengan Bpk/Ibu ' . $nama . '</a></div>';
            }
?>
            <div class="lcp-list">
                <div class="lcp-list-name"><span class="tebal">Hubungi: </span>Bpk/Ibu <?php echo $nama; ?></div>
                <?php echo $phone; ?>
                <?php echo $wa; ?>

            </div>
<?php
        }
        echo '</div>';
    }
}



/**
 * Function to get loker expired date
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_get_loker_expired_date()
{
    $ed = carbon_get_post_meta(get_the_ID(), 'date_loker_expired'); // output e.g 20-October-2023.

    if ($ed) {

        // Ubah tanggal kedaluwarsa menjadi format timestamp untuk perbandingan yang lebih mudah.
        $ed_timestamp = strtotime($ed);

        // Peroleh tanggal saat ini dalam format timestamp.
        $current_date = time();

        // Bandingkan tanggal saat ini dengan tanggal kedaluwarsa.
        if ($current_date < $ed_timestamp) {
            return  true;
        } else {
            return false;
        }
    }
}


/**
 * Function show loker date
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_loker_date($what = '')
{
    $loker_is_open = mm_get_loker_expired_date();
    $pass = array('div', 'a');
    if ($loker_is_open) {
        if ('tanggal' == $what) {
            $ed = carbon_get_post_meta(get_the_ID(), 'date_loker_expired');
            echo '<span class="loker-date loker-date-open">Apply Sebelum ' . $ed . '</span>';
        } elseif ('button open' == $what) {
            $button_attribute = '<a class="loker-btn loker-open" href="' . get_the_permalink() . '" title="Lamar Kerja Satpam">Apply Now</a>';
            echo wp_kses($button_attribute, mah($pass));
        } elseif ('button close' == $what) {
            $button_attribute = '';
        }
    } else {
        if ('tanggal' == $what) {
            echo '<span class="loker-date loker-date-closed">Close</span>';
        } elseif ('button open' == $what) {
            $button_attribute = '';
        } elseif ('button close' == $what) {
            $button_attribute = '<div class="loker-btn loker-closed show">Loker Closed</div>';
            echo wp_kses($button_attribute, mah($pass));
        }
    }
}
