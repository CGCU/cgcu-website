/**
 * Created by andrewhill on 06/07/2016.
 */

$( window ).resize(function() {
    if($( window ).width() < 768) {
        $( "#facebook-navbar" ).html("CGCU Facebook");
        $( "#twitter-navbar" ).html("CGCU Twitter");
    } else {
        $( "#facebook-navbar" ).html("");
        $( "#twitter-navbar" ).html("");
    }
});