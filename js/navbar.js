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
    $( "#currentWidth" ).html($( window ).width());

    responsiveNavbar();
});

/* Upon resizing the viewport */
$( window ).resize(function() {
    $( "#currentWidth" ).html($( window ).width());

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

    } else {
        $( "#facebook-navbar" ).html("");
        $( "#twitter-navbar" ).html("");
    }


    /* 'Turn off' navbar-right between these widths */ /* COMMENTED OUT
    POTENTIALLY DO NOT WANT TO DO THIS

    if($( window ).width < 992 && $( window ).width >= 768) {
        $( ".navbar-social-media" ).removeClass("navbar-right");
    } else {
        $( ".navbar-social-media" ).addClass("navbar-right");

    }
    COMMENT OUT END */

    /* Container-fluid or not container-fluid */
    if( $( window ).width() < 1200) {
        $( ".variable-fluid" ).removeClass("container").addClass("container-fluid");
    } else {
        $( ".variable-fluid" ).removeClass("container-fluid").addClass("container");
    }


}



