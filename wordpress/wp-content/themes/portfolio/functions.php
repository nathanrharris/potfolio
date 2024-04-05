<?php

function theme_styles() {
  wp_enqueue_style('main', get_template_directory_uri() . '/css/styles.css');
}

function theme_js() {
  wp_enqueue_script('cookie', get_template_directory_uri() . '/js/js.cookie.js', array('jquery'), '', true);
  wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('packery', get_template_directory_uri() . '/js/packery-mode.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('snap', get_template_directory_uri() . '/js/jquery.scrollify.js', array('jquery'), '', true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', false);
}

add_action('wp_enqueue_scripts', 'theme_js');
add_action('wp_enqueue_scripts', 'theme_styles');

add_image_size('portfolio_thumb_small', 290, 228, array('x_crop_position' => 'center', 'y_crop_position' => 'top'));
add_image_size('portfolio_full', 590, 466, array('x_crop_position' => 'center', 'y_crop_position' => 'top'));

remove_filter('template_redirect','redirect_canonical');
