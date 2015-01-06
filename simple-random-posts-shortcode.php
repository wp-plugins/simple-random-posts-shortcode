<?php

/**
 * Plugin Name: Simple Random Posts Shortcode
 * Plugin URI: https://www.kerstner.at/2014/07/simple-random-posts-shortcode-wordpress-plugin/
 * Description: A simple plugin for rendering random post previews in a list view using shortcode.
 * Version: 0.3
 * Author: Matthias Kerstner
 * Author URI: https://www.kerstner.at
 * License: GPLv2 or later
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
defined('ABSPATH') or die("No script kiddies please!");

add_shortcode('simple_random_posts', 'kerstnerat_simple_random_posts_shortcode');

/**
 * Outputs random posts using attributes specified.
 * @param array $atts
 * @return string
 */
function kerstnerat_simple_random_posts($atts) {
    $output = '';
    $the_query = new WP_Query($atts);

    if ($the_query->have_posts()) {
        $output .= '<div class="' . $atts['container_css_class'] . '">';

        while ($the_query->have_posts()) {
            $the_query->the_post();

            $output .= '<div class="' . $atts['container_article_css_class'] . '">';

            $output .= '<div style="float:left;width:'
                    . $atts['container_left_width'] . ';"><ul><li><strong>'
                    . get_the_title()
                    . '</strong><br/>' . strip_tags(mb_substr(get_the_content(), 0, (int) $atts['preview_text_chars']))
                    . '...<br/><a href="' . get_the_permalink()
                    . '" title="' . get_the_title()
                    . '">&raquo; Read more</a></li></ul></div>';

            $output .= '<div style="float:right;width:'
                    . $atts['container_right_width'] . ';">';
            if ($atts['show_featured_image']) {
                if (has_post_thumbnail(get_the_ID())) {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                    $output .= '<img src="' . $image[0] . '" alt="' . get_the_title()
                            . '" title="' . get_the_title() . '" height="100" />';
                }
            }
            $output .= '</div>';

            $output .= '</div><div style="clear:both;"></div>';
        }

        $output .= '</div>';

        if ($atts['append_css_clear']) {
            $output .= '<div style="clear:both;"></div>';
        }
    }

    wp_reset_postdata();

    return $output;
}

/**
 * Shortcode handler for plugin. Takes care of setting default options.
 * @param array $atts
 * @param string? $content
 * @return string
 */
function kerstnerat_simple_random_posts_shortcode($atts, $content = null) {
    $originalAtts = $atts;
    $attsCombined = shortcode_atts(array(
        'title' => '',
        'author' => '',
        'append_css_clear' => true,
        'category' => '',
        'container_css_class' => 'articles-preview-container',
        'container_article_css_class' => 'article-preview',
        'container_left_width' => '65%',
        'container_right_width' => '30%',
        'date_format' => '(n/j/Y)',
        'display_posts_off' => false,
        'exclude_current' => false,
        'featured_image_height' => 100,
        'header' => false,
        'id' => false,
        'ignore_sticky_posts' => true,
        'image_size' => false,
        'include_title' => true,
        'include_author' => false,
        'include_content' => true,
        'include_date' => false,
        'include_excerpt' => false,
        'meta_key' => '',
        'meta_value' => '',
        'no_posts_message' => '',
        'offset' => 0,
        'order' => 'DESC',
        'orderby' => 'rand',
        'post_parent' => false,
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => 5,
        'show_featured_image' => true,
        'preview_text_chars' => 200,
        'tag' => '',
        'tax_operator' => 'IN',
        'tax_term' => false,
        'taxonomy' => false,
        'wrapper' => 'ul',
        'wrapper_class' => 'display-posts-listing',
        'wrapper_id' => false,
            ), $atts, 'display-posts');

    $output = '';

    if (isset($attsCombined['header'])) {
        $output .= $attsCombined['header'];
    }

    return ($output . kerstnerat_simple_random_posts($attsCombined));
}
