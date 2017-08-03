<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/folders/folders_mobile.css"); ?>" />

<div class="folders-wrapper">
    <div class="folder-container new-folder">
        <button class="add-new">Add New</button>
    </div>
    <?php
        foreach ($content['userFolders'] as $userFolder):
    ?>
    <div class="folder-container">
        <h2>
            <?php echo $userFolder['folder_name']; ?>
            <span class="ui-li-count ui-btn-corner-all message-count"><?php echo $userFolder['message_count']; ?></span>
            <i class="fa fa-trash-o" aria-hidden="true"
               data-msg-cnt="<?php echo $userFolder['message_count']; ?>"
               data-fldr-id="<?php echo $userFolder['folder_id']; ?>"
               data-fldr-name="<?php echo $userFolder['folder_name']; ?>"
            ></i>
            <form id="delete_<?php echo $userFolder['folder_id']; ?>" action="Delete_Folder/" method="POST" data-ajax="false">
                <input id="folder_id" name="folder_id" value="<?php echo $userFolder['folder_id']; ?>" type="hidden"/>
            </form>
        </h2>
    </div>
    <?php endforeach; ?>
</div>

<div id="add-new" data-role="popup" data-transition="slidefade" data-dismissible="true">
    <label for="folder-name">Folder Name:</label>
    <input type="text" id="folder-name" name="folder-name" />
    <div class="buttons-container">
        <button id="addNewSubmit">Submit</button>
        <a href="#" data-rel="back" class="cancel-btn"><button>Cancel</button></a>
    </div>
</div><!-- /add new popup -->

<div id="delete-folder" data-role="popup" data-transition="slidefade" data-dismissible="true">
    <p id="delete-folder-msg"></p>
    <div class="buttons-container">
        <button>Continue</button>
        <a href="#" data-rel="back" class="cancel-btn"><button>Cancel</button></a>
    </div>
</div><!-- /add new popup -->

<script type="text/javascript" src="<?php echo base_url("assets/js/views/folders/folders_mobile.js"); ?>"></script>