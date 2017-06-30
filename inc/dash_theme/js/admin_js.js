(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $('.color-field').wpColorPicker();

    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    
     
})( jQuery );