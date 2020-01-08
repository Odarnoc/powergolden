$(function () {

    "use strict";

    var wind = $(window);

    /* ----------------------------------------------------------------
                    [ Navbar ( scrollIt ) ]
    -----------------------------------------------------------------*/

    $.scrollIt({
        upKey: 38, // key code to navigate to the next section
        downKey: 40, // key code to navigate to the previous section
        easing: 'swing', // the easing function for animation
        scrollTime: 600, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -80 // offste (in px) for fixed top navigation
    });


    /* ----------------------------------------------------------------
                    [ Navbar ( Change Background & Logo ) ]
    -----------------------------------------------------------------*/

    wind.on("scroll", function () {

        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo> img");

        if (bodyScroll > 100) {

            navbar.addClass("nav-scroll");
            logo.attr('src', 'images/logo-navbar.png');

        } else {

            navbar.removeClass("nav-scroll");
            logo.attr('src', 'images/logo-navbar-white.png');
        }
    });


    // close navbar-collapse when a  clicked
    $(".navbar-nav a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });



});
