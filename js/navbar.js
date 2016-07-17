/**
 * Created by andrewhill on 06/07/2016.
 *
 * Contains the javascript relating to the Navbar
 * and it's contents
 *
 * use alongside navbar css
 */

/* Adds social media icon labels to the navbar
 * upon navbar collapse (< 768px) */
$( window ).resize(function() {
    if($( window ).width() < 768) {
        $( "#facebook-navbar" ).html("CGCU Facebook");
        $( "#twitter-navbar" ).html("CGCU Twitter");
    } else {
        $( "#facebook-navbar" ).html("");
        $( "#twitter-navbar" ).html("");
    }
});