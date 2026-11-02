<?php
if (!defined('ABSPATH')) { exit; }
function decoteck_next_setup() {
 add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('responsive-embeds');
 add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
 register_nav_menus(array('primary' => __('منوی اصلی', 'decoteck-next')));
}
add_action('after_setup_theme', 'decoteck_next_setup');
function decoteck_next_assets() {
 $theme_version = wp_get_theme()->get('Version');
 wp_enqueue_style('decoteck-next-style', get_stylesheet_uri(), array(), $theme_version);
 wp_enqueue_script('decoteck-next-motion', get_template_directory_uri() . '/assets/js/theme.js', array(), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'decoteck_next_assets');
