jQuery( function($){
    // Convert the dropdown
    $('.woocommerce-ordering select').each( function(){
        var $$ = $(this);

        var c = $('<div></div>')
            .html( $$.find(':selected').html() + '<span class="north-icon-next"></span>' )
            .addClass('ordering-selector-wrapper')
            .insertAfter( $$ );

        var dropdown = $('<ul></ul>')
            .addClass('ordering-dropdown')
            .appendTo(c);

        $$.find( 'option' ).each( function(){
            var $o = $(this);
            dropdown.append(
                $("<li></li>")
                    .html( $o.html() )
                    .data( 'val', $o.attr('value') )
                    .click( function(){
                        $$.val( $(this).data('val') );
                        $$.closest('form').submit();
                    } )
            );
        } );

        // c.css('width', dropdown.width() + 20);

        $$.hide();
    } );
} );