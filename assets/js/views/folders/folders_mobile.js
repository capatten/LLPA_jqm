/*************** GLOBAL VARIABLES ***************/
var $addNew = $(".add-new");
var $trash = $(".fa-trash-o");
var $deleteFolderMsg = $("#delete-folder-msg");
var $addNewSubmit = $("#addNewSubmit");
var $folderName = $("#folder-name");
var $getSelectedFolderFrm = $("#get-selected-folder-frm");
var $folderLink = $(".folder-link");
var $selectedFolder = $("#selected-folder");
/*************** END GLOBAL VARIABLES ***************/

$folderLink.on('click', function(){
    var folderID = $(this).data("fldr-id");
    $selectedFolder.val(folderID);
    $getSelectedFolderFrm.submit();
});

$addNew.on('click', function(){
	$("#add-new").popup( "open" );
	$("#folder-name").focus();
});

$addNewSubmit.on("click", function(){
    var fldr_name = $folderName.val();
    var dataObj = ({folder_name: fldr_name});

    $.mobile.loading( "show", {
        text: "Creating Folder '"+ fldr_name + "'",
        textVisible: true,
        theme: "z",
        html: ""
    });

    $.ajax({
        type: "POST"
        ,url: "Add_Folder/"
        ,data: dataObj
        ,cache: false
        ,success: function(){
            window.location.href="./"
        }
    });
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
            ,data: dataObj
            ,cache: false
            ,success: function(){
                window.location.href="./"
            }
        });
	}
});
/************************** PRIVATE FUNCTIONS *************************/