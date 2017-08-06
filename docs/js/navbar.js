/**
 * Created by andrewhill on 06/07/2016.
 *
 * Contains the javascript relating to the Navbar
 * and it's contents
 *
 * use alongside navbar css
 */

/* After page loads */
$( document ).ready(function() {
    responsiveNavbar();
});

/* Upon resizing the viewport */
$( window ).resize(function() {
    responsiveNavbar();
});


/* Adds social media icon labels to the navbar
 * upon navbar collapse (< 768px) */
function responsiveNavbar() {

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
