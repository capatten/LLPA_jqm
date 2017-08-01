/*************** GLOBAL VARIABLES ***************/
var $messageRow = $(".message-row");
var $getPendingMessageFrm = $("#getPendingMessage_frm");
var selectedPendingMessageID = $("#selected_pending_messageID");
/*************** END GLOBAL VARIABLES ***************/
$(document.body).append($getPendingMessageFrm);

$messageRow.on('click', function(){
	var msgID = $(this).data('msg');
	var msgStatus = $(this).data('approved');	
	selectedPendingMessageID.val(msgID);
	$getPendingMessageFrm.submit();
})

/************************** PRIVATE FUNCTIONS *************************/
