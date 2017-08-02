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

        var message_id = $(this).data("message-id");

        $.ajax({
            type: "POST"
            ,url: "Approve_Message/"
            ,data: {"message_id": message_id}
            ,cache: false
            ,success: function(){
                window.location.href="./Pending_Messages/"
            }
        });
    });
	
	$( document ).on( "swipeleft", "#full-message", function( event ) {
		//Show the confirmation popup
        $( "#confirm" ).popup( "open" );
    });
});

/************************** PRIVATE FUNCTIONS *************************/
