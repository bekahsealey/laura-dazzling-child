/*! Main */
jQuery(document).ready(function($) {

  $( '.click a' ).on( 'click', function(e) {
    e.preventDefault();
      $( this ).toggleClass('minus').siblings( '.hide' ).toggleClass( 'show' );

  });

});