/*************** GLOBAL VARIABLES ***************/
$decline_txt = $("#decline_txt");
$decline_submit = $("#decline_submit");
/*************** END GLOBAL VARIABLES ***************/
$(document).ready(function() {

});

$( document ).on( "pagecreate", "#jqm-page", function() {
	 // Swipe to remove list item
    $( document ).on( "swiperight", "#full-message", function( event ) {
        var message_id = $(this).data("message-id");

        $.mobile.loading( "show", {
            text: "Updating Message Status",
            textVisible: true,
            theme: "z",
            html: ""
        });

        $.ajax({
            type: "POST"
            ,url: "Approve_Message/"
            ,data: ({"message_id": message_id})
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

$decline_submit.on('click', function(){
    var message_id = $(this).data("message-id");
    var decline_txt = $decline_txt.val();
    $.mobile.loading( "show", {
        text: "Updating Message Status",
        textVisible: true,
        theme: "z",
        html: ""
    });

    $.ajax({
        type: "POST"
        ,url: "Decline_Message/"
        ,data: ({"message_id": message_id, "decline_txt": decline_txt })
        ,cache: false
        ,success: function(){
            window.location.href="./Pending_Messages/"
        }
    });
});

/************************** PRIVATE FUNCTIONS *************************/