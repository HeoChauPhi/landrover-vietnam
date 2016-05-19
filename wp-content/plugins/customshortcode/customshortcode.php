<?php
/**
 * Plugin Name: Custom ShortCode
 * Plugin URI: http://heochaua.tk
 * Description: Custom ShortCode
 * Version: 1.0
 * Author: HeoChauA
 * Author URI: http://heochaua.tk
 * License: GPLv2
 */
/*add_shortcode( 'custom_shortcode', 'create_custom_shortcode' );
function create_custom_shortcode($attrs) {
  extract(shortcode_atts (array(
    'args' => '',
  ), $attrs));

    // The content here

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}*/

add_shortcode( 'list_post', 'create_list_post' );
function create_list_post($attrs) {
  extract(shortcode_atts (array(
    'post_type' => '',
    'per_page' => -1
  ), $attrs));

  ob_start();
    global $paged;
    if (!isset($paged) || !$paged){
      $paged = 1;
    }

    $context = Timber::get_context();
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $per_page,
      'paged' => $paged,
    );
    query_posts($args);
    $context['post'] = Timber::get_posts();
    $context['pagination'] = Timber::get_pagination();
    Timber::render('list-post.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
} 

add_shortcode( 'post_by_cat', 'create_post_by_cat' );
function create_post_by_cat($attrs) {
  extract(shortcode_atts (array(
    'post_type' => 'any',
    'per_page' => -1
  ), $attrs));

  ob_start();
    $context = Timber::get_context();
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $per_page,
      'tax_query' => array(
        array(
          'taxonomy' => 'gallery_cat',
          'field' => 'slug',
          'terms' => array('sunsets', 'nature')
        )
      )
    );
    $context['post'] = Timber::get_posts();
    Timber::render('post-cat.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
} 