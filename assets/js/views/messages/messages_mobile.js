/*************** GLOBAL VARIABLES ***************/
var $messageRow = $(".message-row");
var $getMessageFrm = $("#getMessage_frm");
var $selectedMessageID = $("#selected_messageID");

/*************** END GLOBAL VARIABLES ***************/
$messageRow.on('click', function(){
	var msgID = $(this).data('msg');
	//var msgStatus = $(this).data('approved');
	$selectedMessageID.val(msgID);
	$getMessageFrm.submit();
});


$( document ).on( "pagecreate", "#jqm-page", function() {
    $("div.message-row" ).bind( "taphold", tapholdHandler);

    function tapholdHandler(){
    	$("#selected-message").val($(this).data("msg"));
        $( "#move-to" ).popup( "open" );
    }
});

$(document).on('click', '.move-to-folder', function(){
    var dataObj = ({
        'folder_id' : $(this).data('folder-id')
		,'msg_id' : $("#selected-message").val()
	});

    console.log(dataObj)

    $.mobile.loading( "show", {
        text: "Moving Message",
        textVisible: true,
        theme: "z",
        html: ""
    });

    $.ajax({
        type: "POST"
        ,url: "../Folders/Move_To_Folder/"
        ,data: dataObj
        ,cache: false
        ,success: function(){
            window.location.href="./"
			console.log("Success")
        }
    });
});

/************************** PRIVATE FUNCTIONS *************************/
