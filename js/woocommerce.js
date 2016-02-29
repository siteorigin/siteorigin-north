jQuery( function($){
    // Convert the dropdown
    $('.woocommerce-ordering select').each( function(){
        var $$ = $(this);

        var c = $('<div></div>')
            .html( '<span class="current">' + $$.find(':selected').html() + '</span><span class="north-icon-next"></span>' )
            .addClass('ordering-selector-wrapper')
            .insertAfter( $$ );

        var dropdown = $('<ul></ul>')
            .addClass('ordering-dropdown')
            .appendTo(c);

        var widest = 0;
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

            widest = Math.max( c.find('.current').html( $o.html() ).width(), widest);

        } );

        c.find('.current').html( $$.find(':selected').html()).width( widest );

        $$.hide();
    } );
} );