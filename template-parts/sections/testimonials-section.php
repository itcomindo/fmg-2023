<?php

/**
 * Testimonials Section
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

?>

<div id="testi" class="section">
    <div class="container">
        <div id="testi-wr">
            <div id="testi-top">
                <h2 class="section-head-medium">Testimonials</h2>
                <p>Fajarmerah Group senantiasa untuk terus dan secara konsisten meningkatkan performa para staff serta berinovasi untuk memberikan pelayanan yang sesuai dengan eksptektasi para customer kami.</p>
            </div>

            <div id="testi-bot">
                <div id="testi-item-wr">

                    <?php
                    $testimonials = carbon_get_theme_option('testimonials');
                    if ($testimonials) {
                        foreach ($testimonials as $testimonial) {
                            $name = $testimonial['testi_name'];
                            $logo = $testimonial['testi_logo'];
                            if ($logo) {
                                $logo = $testimonial['testi_logo'];
                            } else {
                                $logo = $testimonial['testi_logo'];
                                $pria = $testimonial['testi_pria'];
                                if ($pria) {
                                    $logo = get_template_directory_uri() . '/assets/images/user.webp';
                                } else {
                                    $logo = get_template_directory_uri() . '/assets/images/female-user.webp';
                                }
                            }
                            $testi_content = $testimonial['testi_content'];
                    ?>
                            <div class="testi-item">

                                <span class="testi-author"><?php echo esc_html($name); ?></span>
                                <div class="testi-content-wr">
                                    <blockquote class="testi-content"><?php echo esc_html($testi_content); ?></blockquote>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>




                </div>
            </div>
        </div>
    </div>
</div>