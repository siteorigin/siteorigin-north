jQuery( function($){
    $('.entry-meta a').hover(
        function(){ $(this).closest('li').addClass('hovering'); },
        function(){ $(this).closest('li').removeClass('hovering'); }
    );

    // Setup the search form animation
    $('.search-field')
        .focus( function(e){
            var $f = $(this).closest('.search-form');
            var $o = $('<div class="search-overlay"></div>').appendTo( $f).append('<div class="circle"></div>');
            var $c = $o.find('.circle');

            $c
                .css( {
                    //top: e.offsetY,
                    //left: e.offsetX,
                    top: 17,
                    left: 15,
                    opacity: 0.1,
                    scale: 1
                } )
                .transition( {
                    opacity: 0,
                    scale: $f.width()
                }, 500, 'ease', function(){ $o.remove(); } );

        } );
} );