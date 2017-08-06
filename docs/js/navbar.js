/**
 * Updated by cmpoon
 * Created by andrewhill on 06/07/2016.
 *
 * Contains the javascript relating to the Navbar
 * and it's contents
 *
 * use alongside navbar css
 */


/* Adds social media icon labels to the navbar
 * upon navbar collapse (< 768px) */
responsiveNavbar = function() {

    /* Social Media Labels in collapsed navbar*/
    /* Navbar collapses at 1006 at the moment, normally 992 */
    if($( window ).width() < 1006) {
        $( "#facebook-navbar" ).html("CGCU Facebook");
        $( "#twitter-navbar" ).html("CGCU Twitter");
        $( "#instagram-navbar" ).html("CGCU Instagram");
    } else {
        $( "#facebook-navbar" ).html("");
        $( "#twitter-navbar" ).html("");
        $( "#instagram-navbar" ).html("");
    }

    /* Container-fluid (always) or not container-fluid (never) */
    /* if( $( window ).width() < 1200) {
        $( ".variable-fluid" ).removeClass("container").addClass("container-fluid");
    } else {
        $( ".variable-fluid" ).removeClass("container-fluid").addClass("container");
    } */


}


/** Auto activate **/
autoactivate = function(){
  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf('/')+1);

    var navItems = $(".navbar-autoactivate li");

    /** Recursive activate for submenu **/
    navItems.each(function(idx, li) {
        var navbarItem = $(li);
        navbarItem.find('a').each(function() {
          if (filename == this.href ){
            navbarItem.addClass("active");
          }
        });

        /** Singular activate for single level-menu**/
        var navbarAnchor = navbarItem.children("a");
        var navhref = navbarAnchor.attr("href");

        //Check against
        if (filename == navhref || (navhref == "index.html" && filename == "")){

          navbarItem.addClass("active");
          navbarAnchor.html(navbarAnchor.html() + '<span class="sr-only"> (current)</span>');
        }
      });

    responsiveNavbar();
};


/* After page loads */
$( document ).ready(autoactivate);

/* Upon resizing the viewport */
$( window ).resize(responsiveNavbar);
