jQuery( function($){
    // Lets vertical center the menu in the masthead
    //var repositionMasthead = function(){
    //    var brandingHeight = $('#masthead .site-branding').height();
    //    var navHeight = $('#masthead .main-navigation > div').height();
    //    if( navHeight < brandingHeight ) {
    //        $('#masthead .main-navigation')
    //            .css(
    //            'padding-top',
    //            (brandingHeight - navHeight) / 2
    //        );
    //    }
    //};
    //repositionMasthead();
    //$(window).resize(repositionMasthead);

    $('.entry-meta a').hover(
        function(){ $(this).closest('li').addClass('hovering'); },
        function(){ $(this).closest('li').removeClass('hovering'); }
    );
} );