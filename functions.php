<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'lauras-sticky-nav', get_stylesheet_directory_uri() . '/js/lauras-sticky-nav.js', array('jquery'), '1.0.0', false );
    wp_enqueue_script( 'lauras-hide-show', get_stylesheet_directory_uri() . '/js/lauras-hide-show.js', array('jquery'), '1.0.0', false );

}
add_image_size( 'testimonial', 200, 200 , true); // Thumbnail for testimonial images
add_image_size( 'module', 400, 180 , true); // Thumbnail for module images
/**
 * left and right header menus (should you choose to use one)
 */
register_nav_menus( array(
	'submenu' => __( 'Submenu', 'dazzling' ),
	'left_header_menu' => __( 'Left Header Menu', 'dazzling' ),
	'right_header_menu' => __( 'Right Header Menu', 'dazzling' )
) );

/**
 * sub header menu (should you choose to use one)
 */
function dazzling_submenu() {
  // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'menu'              => 'submenu',
    'theme_location'    => 'submenu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'scroll-stick',
    'menu_class'        => 'nav nav-pills nav-justified',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker()
  ));
} /* end sub header menu */

function dazzling_left_menu() {
  // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'menu'              => 'left_header_menu',
    'theme_location'    => 'left_header_menu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse flex left',
    'menu_class'        => 'nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker()
  ));
}

function dazzling_right_menu() {
  // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'menu'              => 'right_header_menu',
    'theme_location'    => 'right_header_menu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse flex right',
    'menu_class'        => 'nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker()
  ));
} /* end left and right header menus */ 


function lauras_remove_some_widgets(){

unregister_sidebar( 'home-widget-1' );
unregister_sidebar( 'home-widget-2' );
unregister_sidebar( 'home-widget-3' );

unregister_sidebar( 'footer-widget-1' );
unregister_sidebar( 'footer-widget-2' );
unregister_sidebar( 'footer-widget-3' );
}

add_action( 'widgets_init', 'lauras_remove_some_widgets', 11 );

?>