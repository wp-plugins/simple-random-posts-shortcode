=== Simple Random Posts Shortcode ===
Contributors: mkerstner
Tags: simple, random, posts, shortcode
Requires at least: 3.0.1
Tested up to: 4.1.0
Stable tag: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin for rendering random post previews in a list view using shortcode.

== Description ==
A simple plugin for rendering random post previews in a list view using shortcode.
Supports various options to customize output to your needs.

= Supported options =
1. header: <bool>, whether to output header text
2. show_featured_image: <bool>, whether to output featured post image
3. featured_image_height: <int>, height of featured image in px
4. preview_text_chars: <int>, amount of chars to be displayed for preview text

== Installation ==
1. Upload \"simple-random-posts-shortcode.php\" to the \"/wp-content/plugins/\" directory.
2. Activate the plugin through the \"Plugins\" menu in WordPress.

== Changelog ==
= 0.1 =
* Initial release.

= 0.2 =
+ added option to show featured image for posts, ['show_featured_image']
+ added option to specify featured image height, ['featured_image_height']
+ added option to specify char count for preview text, ['preview_text_chars']
* changed HTML to floating divs for better alignment
* added CSS class for div container
