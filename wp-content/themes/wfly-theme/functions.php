<?php
/*
 *  Author: Framework | @Framework
 *  URL: wordfly.com | @wordfly
 *  Custom functions, support, custom post types and more.
 */

// Theme setting
require_once('init/theme-init.php');
require_once('init/options/option.php');

// Custom for theme

function wf_conditional_scripts() {
  wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0');
  wp_enqueue_script('script');
}
add_action('wp_print_scripts', 'wf_conditional_scripts');

function wf_styles() {
  wp_register_style('custom-style', get_template_directory_uri() . '/stylesheet/css/customs.css', array(), '1.0', 'all');
  wp_enqueue_style('custom-style');
}
add_action('wp_enqueue_scripts', 'wf_styles');

/* Enable Function */
// menu
function wf_menu() {
  register_nav_menus();
}
add_action('init', 'wf_menu');

// Theme support custom logo
function wf_setup() {
  add_theme_support( 'custom-logo', array(
    'flex-width' => true,
  ) );
}
add_action( 'after_setup_theme', 'wf_setup' );

// Theme support custom logo
add_theme_support( 'post-thumbnails' );

/* Add Dynamic Siderbar */
if (function_exists('register_sidebar')) {
  // Define Header block
  register_sidebar(array(
    'name' => __('Header'),
    'description' => __('Description for this widget-area...'),
    'id' => 'header-block',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  // Define Footer
  register_sidebar(array(
    'name' => __('Footer block'),
    'description' => __('Description for this widget-area...'),
    'id' => 'footer-block',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  // Define Sidebar
  register_sidebar(array(
    'name' => __('Sidebar one'),
    'description' => __('Description for this widget-area...'),
    'id' => 'sidebar-1',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

// Custom widget arena
add_action( 'widgets_init', 'create_header_Widget' );
function create_header_Widget() {
  register_widget('header_Widget');
}

class header_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname' => 'header_widget',
      'description' => __( 'Custom widget.' ),
      'customize_selective_refresh' => true,
    );
    $control_ops = array( 'width' => 400, 'height' => 350 );
    parent::__construct( 'header_widget', __( 'Header Widget' ), $widget_ops, $control_ops );
  }
  public function widget( $args, $instance ) {
    $title    = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    echo $args['after_widget'];
  }
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }
  function form( $instance ) {
    $title      = esc_attr( $instance['title'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <?php
  }
}

add_action( 'widgets_init', 'create_footer_Widget' );
function create_footer_Widget() {
  register_widget('footer_Widget');
}

class footer_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname' => 'footer_Widget',
      'description' => __( 'Custom widget.' ),
      'customize_selective_refresh' => true,
    );
    $control_ops = array( 'width' => 400, 'height' => 350 );
    parent::__construct( 'footer_Widget', __( 'Footer Widget' ), $widget_ops, $control_ops );
  }
  public function widget( $args, $instance ) {
    $title    = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    echo $args['after_widget'];
  }
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }
  function form( $instance ) {
    $title      = esc_attr( $instance['title'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <?php
  }
}

/* Add custom post type */
function create_my_post_types() {
  register_post_type( 'cars',
    array(
      'labels' => array(
        'name' => __( 'Car' ),
        'singular_name' => __( 'Car' )
      ),
      'supports' => array(
        'title',
        'comments',
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Gallery' )
      ),
      'supports' => array(
        'title',
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_my_post_types' );

function create_custom_taxonomy() {
  $labels_car = array(
    'name' => 'Category Car',
    'singular' => 'Category Car',
    'menu_name' => 'Category Car'
  );
  $args_car = array(
    'labels'                     => $labels_car,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );

  $labels_gallery = array(
    'name' => 'Category Gallery',
    'singular' => 'Category Gallery',
    'menu_name' => 'Category Gallery'
  );
  $args_gallery = array(
    'labels'                     => $labels_gallery,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy('catcar', 'cars', $args_car);
  register_taxonomy('catgallery', 'gallery', $args_gallery);
}
add_action( 'init', 'create_custom_taxonomy', 0 );

/*$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'catcar' ) ); // get current term

$parent = get_term($term->parent, get_query_var('catcar') ); // get parent term

$children = get_term_children($term->term_id, get_query_var('catcar')); // get children

if(($parent->term_id!="" && sizeof($children)>0)) {

  // has parent and child
  echo 'has parent and child';

}elseif(($parent->term_id!="") && (sizeof($children)==0)) {

  // has parent, no child
  echo 'has parent, no child';

}elseif(($parent->term_id=="") && (sizeof($children)>0)) {

  // no parent, has child
  echo 'no parent, has child';

}*/

//$hierarchy = get_terms( 'catcar', array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false )  );

?>
