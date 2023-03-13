<?php

if (get_option('blog_featured_source', 'pageid') == 'pageid') {
    $pageid = get_option('blog_header_featured_type_pageid', 0);
    if ($pageid > 0) {
        echo do_shortcode('[jaw_page id="' . $pageid . '"]');
    }
} else if (get_option('blog_featured_source', 'pageid') == 'jaw-slider') {

    $atts = array();

    $atts[] = 'posts_per_page="' . get_option('jawslider_posts_per_page', 6) . '"';
    $atts[] = 'post_type="' . get_option('jawslider_post_type', 'post') . '"';
    $atts[] = 'order="' . get_option('jawslider_order', 'desc') . '"';
    $atts[] = 'orderby="' . get_option('jawslider_orderby', 'date') . '"';
    $atts[] = 'excerpt="' . get_option('jawslider_excerpt', 20) . '"';

    $category__in = get_option('jawslider_category__in', array());
    if (count($category__in)) {
        $atts[] = 'category__in="' . implode(',', $category__in) . '"';
    }

    $post__in = get_option('jawslider_post__in', '');
    if (strlen($post__in)) {
        $atts[] = 'post__in="' . $post__in . '"';
    }

    $author__in = get_option('jawslider_author__in', array());
    if (count($author__in)) {
        $atts[] = 'author__in="' . implode(',', $author__in) . '"';
    }

    $tag__in = get_option('jawslider_tag__in', array());
    if (count($tag__in)) {
        $atts[] = 'tag__in="' . implode(',', $tag__in) . '"';
    }

    $atts[] = 'sticky_posts="' . get_option('jawslider_sticky_posts', 0) . '"';

    $woo_post__in = get_option('jawslider_woo_post__in', '');
    if (strlen($woo_post__in)) {
        $atts[] = 'woo_post__in="' . $woo_post__in . '"';
    }

    $woo_category__in = get_option('jawslider_woo_category__in', array());
    if (count($woo_category__in)) {
        $atts[] = 'woo_category__in="' . implode(',', $woo_category__in) . '"';
    }

    $woo_tag__in = get_option('jawslider_woo_tag__in', array());
    if (count($tag__in)) {
        $atts[] = 'woo_tag__in="' . implode(',', $woo_tag__in) . '"';
    }

    $atts[] = 'animate_latency="' . get_option('jawslider_animate_latency', 5000) . '"';
    $atts[] = 'animate_duration="' . get_option('jawslider_animate_duration', 1500) . '"';

    $atts[] = 'info_color="' . get_option('jawslider_info_color', '#ffffff') . '"';
    $atts[] = 'info_text_color="' . get_option('jawslider_info_text_color', '#000000') . '"';
    $atts[] = 'info_opacity="' . get_option('jawslider_info_opacity', 90) . '"';
    $atts[] = 'featured_products="' . get_option('jawslider_featured_products', 0) . '"';



    echo do_shortcode('[jaw_slider ' . implode(' ', $atts) . ']');
} else {
    $sliderid = get_option('blog_featured_type_slider', '');
    if (strlen($sliderid) > 0) {
        echo do_shortcode('[rev_slider ' . $sliderid . ']');
    }
}
