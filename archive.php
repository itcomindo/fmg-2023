<?php

/**
 * Archive
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();
echo '<section id="arc" class="section">';
echo '<div class="container">';
if (is_tag()) {
    //get current tag ID.
    $tag_id = get_queried_object_id();
    $args = ([
        'post_type' => 'post',
        'tag__in' => [$tag_id],
        'posts_per_page' => 10,
    ]);
} elseif (is_category()) {
    //get current category ID.
    $category_id = get_queried_object_id();
    $args = ([
        'post_type' => 'post',
        'category__in' => [$category_id],
        'posts_per_page' => 10,
    ]);
} else {
    // $args = ([
    //     'post_type' => 'post',
    //     'posts_per_page' => 10,
    // ]);
}

$query = new WP_Query($args);
if ($query->have_posts()) {
    echo '<div id="arc-wr">';
    while ($query->have_posts()) {
        $query->the_post();
?>
        <div class="arc-item">
            <div class="arc-item-top">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'arc-img', 'alt' => get_the_title(), 'title' => get_the_title())) ?>
                </a>
            </div>
            <div class="arc-item-bot">
                <h3><a rel="bookmark" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
        </div>
<?php
    }
    wp_reset_postdata();
    echo '</div>';
} else {
    echo '<div id="arc-wr">';
    echo '<h1>Sorry, no posts matched your criteria.</h1>';
    echo '</div>';
}


echo '</div>';
echo '</section>';

get_footer();
