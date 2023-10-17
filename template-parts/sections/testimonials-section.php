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
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis in a asperiores non? Odio, quae quibusdam? Animi, fugiat! Modi alias vel cum enim laudantium suscipit illo aliquid dolores harum quisquam.</p>
            </div>

            <div id="testi-bot">
                <div id="testi-item-wr">

                    <?php
                    $testimonials = carbon_get_theme_option('testimonials');
                    if ($testimonials) {
                        foreach ($testimonials as $testimonial) {
                            $name = $testimonial['testi_name'];
                            $logo = $testimonial['testi_logo'];
                    ?>
                            <div class="testi-item">
                                <div class="testi-logo-wr"><img class="testi-logo" src="<?php echo esc_html($logo); ?>" alt="<?php echo esc_html($name); ?>" title="<?php echo esc_html($name) ?>"></div>
                                <span class="testi-author"><?php echo esc_html($name); ?></span>
                                <div class="testi-content-wr">
                                    <blockquote class="testi-content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id aspernatur amet temporibus provident modi voluptates minus veritatis numquam similique. Porro, hic reiciendis nisi commodi et esse consequuntur minima provident enim.
                                    </blockquote>
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