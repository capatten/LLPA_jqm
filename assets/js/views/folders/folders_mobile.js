/*************** GLOBAL VARIABLES ***************/
var $addNew = $(".add-new");
var $trash = $(".fa-trash-o");
var $deleteFolderMsg = $("#delete-folder-msg");
/*************** END GLOBAL VARIABLES ***************/
$addNew.on('click', function(){
	$("#add-new").popup( "open" );
});

$trash.on('click', function(){
	var fldr_id = $(this).data('fldr-id');
    var fldr_name = $(this).data('fldr-name');
    var msg_cnt = $(this).data('msg-cnt');

    if(msg_cnt > 0){
		if(msg_cnt > 1){
            $deleteFolderMsg.html("Folder <strong>" + fldr_name + "</strong> contains <strong>" + msg_cnt + "</strong> messages. Messages will be moved back to your <strong>Home Screen</strong>");
            $("#delete-folder").popup( "open" );
		}else{
            $deleteFolderMsg.html("Folder <strong>" + fldr_name + "</strong> contains 1 message. This message will be moved back to your main folder");
            $("#delete-folder").popup( "open" );
		}
	}else{
    	$("#delete_"+fldr_id).submit();
        var dataObj = {folder_id:fldr_id};

        $.mobile.loading( "show", {
            text: "Deleting Folder '"+ fldr_name + "'",
            textVisible: true,
            theme: "z",
            html: ""
        });

        $.ajax({
            type: "POST"
			,url: "Delete_Folder/"
            ,data: ({"folder_id": fldr_id})
            ,cache: false
            ,success: function(){
                window.location.href="./Pending_Messages"
            }
        });
	}
});
/************************** PRIVATE FUNCTIONS *************************/