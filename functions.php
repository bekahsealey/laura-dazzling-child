<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_image_size( 'testimonial', 200, 200 , true); // Thumbnail for testimonial images
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
    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
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



?>