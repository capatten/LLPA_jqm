/*************** GLOBAL VARIABLES ***************/

/*************** END GLOBAL VARIABLES ***************/
$(document).ready(function() {

});

$( document ).on( "pagecreate", "#jqm-page", function() {
	 // Swipe to remove list item
    $( document ).on( "swiperight", "#full-message", function( event ) {
        $.mobile.loading( "show", {
            text: "Updating Message Status",
            textVisible: true,
            theme: "z",
            html: ""
        });
        alert("Message Accepted");
        $.mobile.loading( "hide" );
    });
	
	$( document ).on( "swipeleft", "#full-message", function( event ) {
		//Show the confirmation popup
        $( "#confirm" ).popup( "open" );
    });
});

/************************** PRIVATE FUNCTIONS *************************/
