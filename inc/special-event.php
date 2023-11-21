<?php

/**
 * Special Event
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;


$the_events = carbon_get_theme_option('the_events');
if ($the_events) {
    foreach ($the_events as $event) {
        $what_event = $event['what_event'];
        $image_event = $event['image_event'];
        $url_event = $event['url_event'];
        $end_event = $event['end_event'];
        $enable_event = $event['enable_event'];
        if ($enable_event) {
            $enable_event = '';
        } else {
            $enable_event = 'hide';
        }
        $how_show_event = $event['how_show_event'];
?>
        <div class="event-<?php echo esc_html($how_show_event); ?> <?php echo esc_html($enable_event); ?>">
            <div class="event-wr <?php echo esc_html($how_show_event); ?>">
                <div class="close-event">X</div>
                <div class="image-event-wr"><a href="<?php echo esc_html($url_event); ?>"><img src="<?php echo esc_html($image_event); ?>" alt=""></a></div>
                <div class="url-event-wr"><a href="<?php echo esc_html($url_event); ?>">More Details</a></div>
            </div>
        </div>
<?php
    }
}
