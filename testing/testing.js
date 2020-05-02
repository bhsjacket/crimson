$(document).ready(function(){
    var donationToggle = false;
    var sectionsToggle = false;
    var searchToggle = false;

    $('.sections-toggle').click(function(){
        if($(window).width() > 925) {
            if(searchToggle == true) {
                $('.search-dropdown').fadeOut('fast', function(){
                    $('.sections-dropdown').fadeIn('fast');
                    sectionsToggle = true;
                    searchToggle = false;
                });
            } else if(donationToggle == true) {
                $('.donation-dropdown').fadeOut('fast', function(){
                    $('.sections-dropdown').fadeIn('fast');
                    sectionsToggle = true;
                    donationToggle = false;
                });
            } else {
                $('.sections-dropdown').slideToggle();
                sectionsToggle = !sectionsToggle;
            }
        } else {
            $('.mobile-menu-outer').fadeToggle('fast');
        }
    });

    $('.search-toggle').click(function(){
        $('.mobile-menu').toggleClass('search-expanded');
        if(sectionsToggle == true) {
            $('.sections-dropdown').fadeOut('fast', function(){
                $('.search-dropdown').fadeIn('fast');
                searchToggle = true;
                sectionsToggle = false;
            });
        } else if(donationToggle == true) {
            $('.donation-dropdown').fadeOut('fast', function(){
                $('.search-dropdown').fadeIn('fast');
                searchToggle = true;
                donationToggle = false;
            });
        } else {
            $('.search-dropdown').slideToggle();
            searchToggle = !searchToggle;
        }
        $('.search-field').focus();
    });

    $('header .header-button').click(function(){
        if(sectionsToggle == true) {
            $('.sections-dropdown').fadeOut('fast', function(){
                $('.donation-dropdown').fadeIn('fast');
                donationToggle = true;
                sectionsToggle = false;
            });
        } else if(searchToggle == true) {
            $('.search-dropdown').fadeOut('fast', function(){
                $('.donation-dropdown').fadeIn('fast');
            });
            donationToggle = true;
            searchToggle = false;
        } else {
            $('.donation-dropdown').slideToggle();
            donationToggle = !donationToggle;
        }
    });

    $(document).scroll(function(){
        if($(window).width() > 925) {
            if($(document).scrollTop() > 400) {
                if(sectionsToggle == true) {
                    $('.sections-dropdown').slideUp();
                    sectionsToggle = false;
                }
                $('.header-left, .header-center').fadeOut('fast', function(){
                    $('.header-right, .default-header').hide();
                    $('.sticky-sections-left').fadeIn('fast');
                    $('.sticky-sections-right, .sticky-sections').show();
                })
            } else {
                $('.sticky-sections-left').fadeOut('fast', function(){
                    $('.sticky-sections-right, .sticky-sections').hide();
                    $('.header-left, .header-center').fadeIn('fast');
                    $('.header-right, .default-header').show();
                });
            }
        } else {
            $('.sticky-sections-left').fadeOut('fast', function(){
                $('.sticky-sections-right, .sticky-sections').hide();
                $('.header-left, .header-center').fadeIn('fast');
                $('.header-right, .default-header').show();
            });
        }
    });

    $(window).resize(function(){
        if($(window).width() > 925) {
            $('.mobile-menu-outer').fadeOut('fast');
        }
    });
});