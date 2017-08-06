/**
 * Updated by cmpoon
 * Created by andrewhill on 17/07/2016.
 */


$().ready(function(){

  /**
  * Contact form modal
  **/
  if (window.location.href.search("contact.html") !== -1 && window.location.search.search("thanks") !== -1){
    $('#thanksModal').modal('show')
  }

  /**
  * Comittee table loader
  **/
  if (window.location.href.search("committee.html") !== -1){
    var thisYear = "2017";

    $.get("committeeTabs.php?year="+year, function( data ) {
      $("#committeeInfo").html( data );
      console.log( "Committee info loaded." );
    });
  }
});
