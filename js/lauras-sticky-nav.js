/*! Main */
jQuery(document).ready(function($) {
  

  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      //console.log($(window).scrollTop())
        var top = $( '.navbar-default' ).height();
      if ( $( ".intro" ).length ) {
        var intro = $( '.intro' ).height();
        top = top + intro;
    }
      if ( $( ".top-section" ).height() > 0 ) {
        var topSection = $( '.top-section' ).height();
        top = top + topSection + 72;
    }
    console.log(topSection);
    if ($(window).scrollTop() > top) {
      $('.scroll-stick').addClass('navbar-fixed-top');
    }
    if ($(window).scrollTop() < top) {
      $('.scroll-stick').removeClass('navbar-fixed-top');
    }

  });


});