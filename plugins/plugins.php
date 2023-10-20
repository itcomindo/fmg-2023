<?php

/**
 * Plugins
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;






add_action('wp_head', function () {
    if (!mm_is_devmode()) {
?>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-5DWL9XK');
        </script>
        <!-- End Google Tag Manager -->
    <?php
    }
});





add_action('wp_body_open', function () {
    if (!mm_is_devmode()) {
    ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DWL9XK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
<?php
    }
});


function cwpai_get_posts_from_editors_with_acf()
{
    // Get users with the role 'editor'
    $users = get_users(array('role' => 'editor'));
    $user_ids = array();

    // Extract user IDs
    foreach ($users as $user) {
        $user_ids[] = $user->ID;
    }

    // Query parameters
    $args = array(
        'post_type' => 'post',
        'author__in' => $user_ids, // Only get posts authored by editors
        'posts_per_page' => 5, // Limit to 5 posts per user
        'meta_query' => array(
            array(
                'key' => 'aktif', // ACF field name
                'value' => '1', // ACF field value
                'compare' => '=='
            )
        )
    );

    // The Query
    $query = new WP_Query($args);
    return $query;
}
