jQuery( function($){
    // Convert the dropdown
    $('.woocommerce-ordering select').each( function(){
        var $$ = $(this);

		if ( $( 'body' ).hasClass( 'rtl' ) ) {
			var c = $('<div></div>')
	            .html( '<span class="current">' + $$.find(':selected').html() + '</span><span class="north-icon-previous"></span>' )
	            .addClass('ordering-selector-wrapper')
	            .insertAfter( $$ );
		} else {
			var c = $('<div></div>')
	            .html( '<span class="current">' + $$.find(':selected').html() + '</span><span class="north-icon-next"></span>' )
	            .addClass('ordering-selector-wrapper')
	            .insertAfter( $$ );
		}

        var dropdownContainer = $('<div/>')
            .addClass('ordering-dropdown-container')
            .appendTo(c);

        var dropdown = $('<ul></ul>')
            .addClass('ordering-dropdown')
            .appendTo(dropdownContainer);

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

	$('.product-quick-view-button').click( function(e) {
		e.preventDefault();

		var id = $(this).attr('data-product-id');

		$.post(
			so_ajax.ajaxurl,
			{ action: 'so_product_quick_view', product_id: id },
			function( data ) {
				$(document).find('#quick-view-container').find('#product-quick-view').html(data);
			}
		);

		if($(document).find('#quick-view-container').is(':hidden')) {
			$(document).find('#quick-view-container').find('#product-quick-view').empty();
		}

		$(document).find('#quick-view-container').fadeIn(300);

		$(window).mouseup(function (e) {
		    var container = $("#product-quick-view");
		    if ( ! container.is(e.target) && container.has(e.target).length === 0 ) {
		        $('#quick-view-container').fadeOut(300);
		    }
		});

	} );

} );
