/*************** GLOBAL VARIABLES ***************/
var $messageRow = $(".message-row");
var $getMessageFrm = $("#getMessage_frm");
var $selectedMessageID = $("#selected_messageID");

/*************** END GLOBAL VARIABLES ***************/
$messageRow.on('click', function(){
	var msgID = $(this).data('msg');
	var msgStatus = $(this).data('approved');	
	$selectedMessageID.val(msgID);
	$getMessageFrm.submit();
})

/************************** PRIVATE FUNCTIONS *************************/
