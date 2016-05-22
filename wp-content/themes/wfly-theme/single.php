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

/*if ( post_type_exists('cars') ) {
  $field = get_field_object('car_currency');
  $value = get_field('car_currency');
  $context['currency_choices'] = $field['choices'][ $value ];
}*/

Timber::render( 'single.twig', $context );
