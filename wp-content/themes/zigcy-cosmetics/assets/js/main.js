(function ($) { 
'use strict';
/* Category arrow */
$('.widget_product_categories').each( function() {
  $(this).find('.cat-parent').append('<i class="lnr lnr-chevron-right cat-trigger"></i>');
} );
$('.widget_product_categories').on( 'click', '.cat-trigger', function() {
  if( $( this ).hasClass( 'cat-toggle' ) ){
    $(this).removeClass( 'cat-toggle' );
    $(this).siblings('.children').slideUp();
  }  
  else {
    $(this).addClass('cat-toggle');
    $(this).siblings('.children').slideDown();
  }

});

})( jQuery );