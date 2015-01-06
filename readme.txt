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

= Supported shortcode options =
1. header: <string>, whether to output header text (default=)
2. show_featured_image: <bool>, whether to output featured post image (default=TRUE)
3. featured_image_height: <int>, height of featured image in px (default=100)
4. preview_text_chars: <int>, amount of chars to be displayed for preview text (default=200)
5. container_css_class: <string>, CSS class of outer container (default=articles-preview-container)
5. container_article_css_class: <string>, CSS class of article containe (default=article-preview)
5. append_css_clear: <bool>, whether to append a CSS clear container (default=TRUE)
6. container_left_width: <int>, px or % (default=65%)
7. container_right_width: <int>, px or % (default=30%)

== Installation ==
1. Upload and extract simple-random-posts-shortcode.zip to your plugins directory
2. Activate the plugin through the Plugins menu in WordPress

== Changelog ==
= 0.1 =
* Initial public release.

= 0.2 =
+ added option to show featured image for posts, ['show_featured_image']
+ added option to specify featured image height, ['featured_image_height']
+ added option to specify char count for preview text, ['preview_text_chars']
* changed HTML to floating divs for better alignment
* added option to specify CSS class for outer div container, ['container_css_class']

= 0.3 =
+ added option to append CSS clear container, ['append_css_clear']
+ added option to specify width of left container, ['container_left_width']
+ added option to specify width of right container, ['container_right_width']
* added option to specify CSS class for article container, ['container_article_css_class']