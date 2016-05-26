<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

/*$value = get_field_objects($data["post"]->ID);
print_r($value);*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context["acf"] = get_field_objects($data["post"]->ID);

if (is_singular( 'cars' ) ) {
  $field_name = "car_info";
  $field = get_field_object($field_name);
  $items = $field['layouts'][0]['sub_fields'];
  $items_value = $field['value'][0];
  $context['carinfo'] = $items;
  $context['carinfo_value'] = $items_value;
}

Timber::render( 'single.twig', $context );
