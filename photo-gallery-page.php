<?php

/**
 * Template Name: Photo Gallery Page
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();

/**
 * Function get_images_from_directory
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_get_images_from_directory()
{
    $dir = wp_upload_dir();
    $satpam_dir = $dir['basedir'] . '/satpam/';

    $images = glob($satpam_dir . '*.webp');

    return $images;
}

/**
 * Function show image
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_display_images()
{
    $images = mm_get_images_from_directory();

    if ($images) {
        foreach ($images as $image) {
            $image_url = content_url() . '/uploads/satpam/' . basename($image);
            echo '<div class="img-item"><img src="' . esc_url($image_url) . '" alt="Photo Gallery Fajarmerah Group"></div>';
        }
    }
}



?>

<div id="gal" class="section">
    <div class="container">
        <div id="gal-wr" class="w100">
            <?php mm_display_images(); ?>
        </div>
    </div>
</div>

<?php

get_footer();
