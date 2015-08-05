
/* globals jQuery */

// The burst animation plugin
(function($){

    var mousePos = { x: 0, y: 0};
    $(document).mousemove( function( e ){
        mousePos = {
            x: e.pageX,
            y: e.pageY
        };
    } );

    $.fn.burstAnimation = function(options){
        var settings = $.extend({
            event: "click",
            container: "parent"
        }, options );

        return $(this).each( function(){
            var $$ = $(this),
                $p = settings.container === 'parent' ? $$.parent() : $$.closest( settings.container),
                $o = $('<div class="burst-animation-overlay"></div>').appendTo($p),
                $c = $('<div class="burst-circle"></div>').appendTo($o);

            $$.on( settings.event, function(){

                $o.appendTo($p);
                $c
                    .css( {
                        top: mousePos.y - $p.offset().top,
                        left: mousePos.x - $p.offset().left,
                        opacity: 0.1,
                        scale: 1
                    } )
                    .transition( {
                        opacity: 0,
                        scale: $p.width()
                    }, 500, 'ease', function(){
                        $o.detach();
                    } );
            } );

        } );
    };
})(jQuery);



jQuery( function($){

    $('.entry-meta a').hover(
        function(){ $(this).closest('li').addClass('hovering'); },
        function(){ $(this).closest('li').removeClass('hovering'); }
    );

    if( typeof $.fn.fitVids !== 'undefined' ) {
        $('.entry-content').fitVids();
    }

    // Remove the no-js body class
    $('body.no-js').removeClass('no-js');
    if( $('body').hasClass('css3-animations') ) {
        // Display the burst animation
        $('.search-field').burstAnimation({
            event: "focus",
            container: ".search-form"
        });

        var resetMenu = function(){
            $('.main-navigation ul ul').show();
            $('.main-navigation ul ul').each( function(){
                var $$ = $(this);
                var width = Math.max.apply(Math, $$.find('> li > a').map( function(){ return $(this).width(); } ).get());
                $$.find('> li > a').width( width );
            } );
            $('.main-navigation ul ul').hide();
        };
        resetMenu();

        // Handle menu hovers
        $('.main-navigation ul li').hover(
            function(){
                var $$ = $(this),
                    $u = $$.find('ul').eq(0),
                    left = 0,
                    isSub = $$.parents('ul').is('.sub-menu, .children');

                if( $$.parents('ul').is('.sub-menu, .children') ) {
                    left = $u.width();
                }
                else {
                    left = -($u.width() - $$.width())/2;
                }

                $u
                    .css('display', 'block')
                    .clearQueue()
                    .css({
                        left: left,
                        opacity: 0,
                        x: isSub ? -3 : 0,
                        y: isSub ? 0 : -3,
                        scale: 0.975
                    })
                    .transition({
                        opacity: 1,
                        x: 0,
                        y: 0,
                        scale: 1
                    }, 220 );
            },
            function(){
                var $$ = $(this),
                    $u = $$.find('ul').eq(0),
                    isSub = $$.parents('ul').is('.sub-menu, .children');

                $u
                    .css('display', 'block')
                    .clearQueue()
                    .transition({
                        opacity: 0,
                        x: isSub ? -4 : 0,
                        y: isSub ? 0 : -4,
                        scale: 0.95
                    }, 160, function(){ $(this).hide(); });
            }
        );

        // Burst animatin when the user clicks on a sub link
        $('.main-navigation ul ul li a').burstAnimation({
            event: "click",
            container: "parent"
        });
    }
} );