
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
                $o = $('<div class="burst-animation-overlay"></div>'),
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

    $.fn.burstMenuHover = function( options ) {
        var settings = $.extend({
            left: null,
        }, options );

        return $(this).each( function(){
            var $$ = $(this);
            return $$.hover(
                function(){
                    var $$ = $(this),
                        $u = $$.find('ul').eq(0),
                        left = 0,
                        isSub = $$.parents('ul').is('.sub-menu, .children');

                    if( settings.left === null ){
                        if( $$.parents('ul').is('.sub-menu, .children') ) {
                            // Place to the right of the box
                            left = $u.parent().width();
                        }
                        else {
                            // Center the sub menu
                            left = -($u.width() - $$.width())/2;
                        }
                    }
                    else {
                        left = settings.left;
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
        } );
    };
})(jQuery);



jQuery( function($){

    $('.entry-meta a').hover(
        function(){ $(this).closest('li').addClass('hovering'); },
        function(){ $(this).closest('li').removeClass('hovering'); }
    );

    if( typeof $.fn.fitVids !== 'undefined' ) {
        $( '.entry-content' ).fitVids();
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
        $(window).resize( resetMenu );

        // Handle menu hovers
        $('.main-navigation ul li').burstMenuHover();

        // Burst animatin when the user clicks on a sub link
        $('.main-navigation ul ul li a').burstAnimation({
            event: "click",
            container: "parent"
        });
    }

    // Handle displaying the mobile menu
    var $mobileMenu = false;
    $('#mobile-menu-button').click( function(e){
        e.preventDefault();
        var $$ = $(this);
        $$.toggleClass('to-close');

        if( $mobileMenu === false ) {
            $mobileMenu = $('<div></div>')
                .append($('.main-navigation ul').first().clone())
                .attr('id', 'mobile-navigation')
                .appendTo('#masthead').hide();

            if( $('#header-search form').length ) {
                $mobileMenu.append( $('#header-search form').clone() );
            }

            $mobileMenu.find('ul').show().css('opacity', 1);
        }

        $mobileMenu.slideToggle('fast');
    } );

    // The scroll to top button
    var sttWindowScroll = function(){
        var top  = window.pageYOffset || document.documentElement.scrollTop;

        if( top > $('#masthead').outerHeight() ) {
            if( !$('#scroll-to-top').hasClass('show') ) {
                $('#scroll-to-top').css('pointer-events', 'auto').addClass('show');
            }
        }
        else {
            if( $('#scroll-to-top').hasClass('show') ) {
                $('#scroll-to-top').css('pointer-events', 'none').removeClass('show');
            }
        }
    };
    sttWindowScroll();
    $( window ).scroll( sttWindowScroll );
    $( '#scroll-to-top' ).click( function(){
        $( 'html,body' ).animate( { scrollTop: 0 } );
    } );

    // Now lets do the sticky menu

    if( $('#masthead').hasClass('sticky-menu') && !$('body').hasClass('is-mobile') ) {
        var $mhs = false,
            mhTop = false,
            pageTop = $('#page').offset().top,
            $mh = $('#masthead');

        var smSetup = function () {
            pageTop = $('#page').offset().top;

            if ($mhs === false) {
                $mhs = $('<div class="masthead-sentinel"></div>').insertAfter($mh);
            }
            if( mhTop === false ) {
                mhTop = $mh.offset().top;
            }


            var top  = window.pageYOffset || document.documentElement.scrollTop;
            $mh.css({
                'position': 'relative',
                'top': 0,
                'left': 0,
                'width': null,
            });

            var adminBarOffset = $('#wpadminbar').css('position') === 'fixed' ? $('#wpadminbar').outerHeight() : 0;

            if( top + adminBarOffset > $mh.offset().top ) {

                $mhs.show().css({
                    'height': $mh.outerHeight(),
                    'margin-bottom' : $mh.css('margin-bottom')
                });
                $mh.css({
                    'position': 'fixed',
                    'top': adminBarOffset,
                    'left': 0 - self.pageXOffset+'px',
                    'width': '100%',
                });
            }
            else {
                $mhs.hide();
            }
        };
        smSetup();
        $(window).resize( smSetup ).scroll( smSetup );

        var mhPadding = {
            top: parseInt($mh.css('padding-top')),
            bottom: parseInt($mh.css('padding-bottom'))
        };

        if( $mh.data('scale-logo') ) {
            var smResizeLogo = function(){
                var top  = window.pageYOffset || document.documentElement.scrollTop;
                top -= pageTop;

                var $img = $mh.find('.site-branding img'),
                    $branding = $mh.find('.site-branding > *');

                if( top > 0 ) {
                    var scale = 0.775 + ( Math.max( 0, 48 - top ) / 48 * (1-0.775) );

                    if( $img.length ) {
                        $img.css( {
                            width: $img.attr('width') * scale,
                            height: $img.attr('height') * scale
                        } );
                    }
                    else {
                        $branding.css('transform', 'scale(' + scale + ')');
                    }

                    $mh.css({
                        'padding-top' : mhPadding.top * scale,
                        'padding-bottom' : mhPadding.bottom * scale
                    }).addClass('floating');
                }
                else {
                    if( $img.length ) {
                        $img.css({
                            width: $img.attr('width'),
                            height: $img.attr('height')
                        });
                    }
                    else {
                        $branding.css('transform', 'scale(1)');
                    }

                    $mh.css({
                        'padding-top' : mhPadding.top,
                        'padding-bottom' : mhPadding.bottom
                    }).removeClass('floating');
                }
            };
            smResizeLogo();
            $( window ).scroll( smResizeLogo );
        }
    }

    // Handle the header search
    var $hs = $('#header-search');
    $('#masthead .north-icon-search').click( function(){
        $hs.fadeIn('fast');
        $hs.find('form').css('margin-top', -$hs.find('form').outerHeight() / 2);
        $hs.find('input[type="search"]').focus().select();
        $hs.find('.svg-icon-close').attr("class", "svg-icon-close animate-in");
    } );
    $hs.find('.svg-icon-close').click( function(){
        $hs.fadeOut(350);
        $(this).attr("class", "svg-icon-close");
    } );
    $(window).scroll( function(){
        if( $hs.is(':visible') ) {
            $hs.find('form').css('margin-top', -$hs.find('form').outerHeight() / 2);
        }
    } );

} );
