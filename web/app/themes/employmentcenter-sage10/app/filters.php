<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

add_filter('do_shortcode_tag', function($output, $tag, $attr) {
    if(isset($attr['container']) && $attr['container'] === "true") {
        return '<div class="container">' . $output . '</div>';
    } else {
        return $output;
    }
}, 10, 3);