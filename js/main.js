/**
 * Updated by cmpoon
 * Created by andrewhill on 17/07/2016.
 */


$().ready(function(){

  /**
  * Contact form modal
  **/
  if (window.location.href.search("contact") !== -1 && window.location.search.search("thanks") !== -1){
    $('#thanksModal').modal('show')
  }

  /**
  * Comittee table loader
  **/
  if (window.location.href.search("committee") !== -1){

    $.get("committeeTabs.php", function( data ) {
      $("#committee-info").html( data );
      console.log( "Committee info loaded." );
    });
  }
});
