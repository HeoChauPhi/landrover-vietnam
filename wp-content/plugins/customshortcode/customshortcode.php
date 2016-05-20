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

// List post with pagination
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

// List post by txonomy terms
add_shortcode( 'post_by_cat', 'create_post_by_cat' );
function create_post_by_cat($attrs) {
  extract(shortcode_atts (array(
    'post_type' => '',
    'per_page' => -1,
    'tax' => '',
    'terms' => array(),
  ), $attrs));

  ob_start();
    $context = Timber::get_context();
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $per_page,
      'tax_query' => array(
        array(
          'taxonomy' => $tax,
          'field' => 'slug',
          'terms' => $terms
        )
      )
    );
    $context['posts'] = Timber::get_posts($args);
    Timber::render('post-cat.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// List post by txonomy terms
add_shortcode( 'best_post', 'create_best_post' );
function create_best_post($attrs) {
  extract(shortcode_atts (array(
    'post_type' => '',
    'per_page' => -1,
  ), $attrs));

  ob_start();
    $context = Timber::get_context();
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $per_page,
      'orderby' => 'post_views',
      'order' => 'DESC',
    );
    $context['posts'] = Timber::get_posts($args);
    Timber::render('post-best.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// Ovride Counter Per Day plugin
add_shortcode( 'count_per_day', 'create_count_per_day' );
function create_count_per_day() {
  ob_start();
    if(is_user_logged_in() && current_user_can('administrator')) {
      echo '<div class="counter-total">'.do_shortcode("[CPD_READS_TOTAL]").'</div>';
      echo '<ul class="counter-list">';
      echo '<li><span>Tổng số truy cập:</span>' . do_shortcode("[CPD_READS_TOTAL]") . '</li>';
      echo '<li><span>Truy cập hôm qua:</span>' . do_shortcode("[CPD_READS_YESTERDAY]") . '</li>';
      echo '<li><span>Truy cập hôm nay:</span>' . do_shortcode("[CPD_READS_TODAY]") . '</li>';
      echo '</ul>';
    } else {
      echo '<div class="counter-message">Vui lòng đăng nhập để sử dụng chức năng này</div>';
    }
    
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}