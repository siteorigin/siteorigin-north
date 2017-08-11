jQuery( function($){
    // Convert the dropdown.
    $( '.woocommerce-ordering select' ).each( function() {
        var $$ = $( this );

		if ( $( 'body' ).hasClass( 'rtl' ) ) {
			var c = $( '<div></div>' )
	            .html( '<span class="current">' + $$.find( ':selected' ).html() + '</span><span class="north-icon-previous"></span>' )
	            .addClass( 'ordering-selector-wrapper' )
	            .insertAfter( $$ );
		} else {
			var c = $( '<div></div>' )
	            .html( '<span class="current">' + $$.find(':selected').html() + '</span><span class="north-icon-next"></span>' )
	            .addClass( 'ordering-selector-wrapper' )
	            .insertAfter( $$ );
		}

        var dropdownContainer = $( '<div/>' )
            .addClass( 'ordering-dropdown-container' )
            .appendTo(c);

        var dropdown = $( '<ul></ul>' )
            .addClass( 'ordering-dropdown' )
            .appendTo( dropdownContainer );

        var widest = 0;
        $$.find( 'option' ).each( function() {
            var $o = $( this );
            dropdown.append(
                $( "<li></li>" )
                    .html( $o.html() )
                    .data( 'val', $o.attr( 'value' ) )
                    .click( function() {
                        $$.val( $( this ).data( 'val' ) );
                        $$.closest( 'form' ).submit();
                    } )
            );

            widest = Math.max( c.find('.current').html( $o.html() ).width(), widest );

        } );

        c.find( '.current' ).html( $$.find( ':selected' ).html() ).width( widest );

        $$.hide();
    } );

    // Open dropdown on click.
	$( '.ordering-selector-wrapper' ).click( function() {
		$(this).toggleClass( 'open-dropdown' );
	} );

	// Closing dropdown on click outside dropdown wrapper.
	$( window ).click( function( e ) {
		if ( !$( e.target ).closest( '.ordering-selector-wrapper.open-dropdown' ).length ) {
			$( '.ordering-selector-wrapper.open-dropdown' ).removeClass( 'open-dropdown' );
		}
	})

	$('.product-quick-view-button').click( function( e ) {
		e.preventDefault();

		var $container = '#quick-view-container';
		var $content = '#product-quick-view';

		var id = $( this ).attr( 'data-product-id' );

		$.post(
			so_ajax.ajaxurl,
			{ action: 'so_product_quick_view', product_id: id },
			function( data ) {
				$( document ).find( $container ).find( $content ).html( data );
			}
		);

		if ( $( document ).find( $container ).is( ':hidden' ) ) {
			$( document ).find( $container ).find( $content ).empty();
		}

		$( document ).find( $container ).fadeIn( 300 );

		$( window ).mouseup( function( e ) {
		    var container = $($content);
		    if ( ( !container.is(e.target) && container.has(e.target).length === 0 ) || $( '.quickview-close-icon' ).is( e.target ) ) {
		        $( $container ).fadeOut( 300 );
		    }
		} );

        $( document ).keyup( function( e ) {
			var container = $( $content );
			if ( e.keyCode == 27 ) { // Escape key maps to keycode `27`
				$( $container ).fadeOut( 300 );
			}
		} );

	} );

} );
