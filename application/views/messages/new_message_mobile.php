<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/messages/new_message_mobile.css"); ?>" />
<style>
	div.new-message-wrapper {
		position: absolute;
	    top: 0.625em;
	    bottom: 0;
	    left: 1em;
	    right: 1em;
	}

    div.new-message-wrapper div.new-message-content {
        padding-top: 0.3125em;
        border: 0.0625em solid #C1C1C1;
    }

    div.new-message-wrapper div.new-message-content div.img-container {
        text-align: center;
        height: 4.125em;
    }

    div.new-message-wrapper div.new-message-content div.img-container img {
        width: 4.125em;
        height: 4.125em;
        vertical-align: middle;
        border-radius: 50%;
        position: absolute;
        left: 0.625em;
    }

    div.new-message-wrapper div.new-message-content div.img-container span {
        line-height: 4.125em;
        text-decoration: none;
        color: #F19355;
        font-weight: bold;
    }

    div.new-message-wrapper div.new-message-content div.text-area-container textarea {
        resize: none;
        height: 10em !important;
        border-radius: 0;
        margin-bottom: 0;
    }

    div.new-message-wrapper div.new-message-content div.bottom-row {
        min-height: 2.5em;
        background-color: #E4E4E4;
        padding: 0.3125em;
    }

    div.new-message-wrapper div.new-message-content div.bottom-row div.send-to-container {
        width: 50%;
        padding: 0.3125em;
    }

    div.new-message-wrapper div.new-message-content div.bottom-row div.send-to-text {
        max-height: 2.5em;
        text-overflow: ellipsis;
        overflow-x: hidden;
        width: 100%;
        white-space: nowrap;
    }

    div.new-message-wrapper div.new-message-content div.bottom-row div.send-to-btn button {
        margin: 0.3125em 0 0 0;
        padding: 0.3125em;
    }

    /******************** JQM POPUP ********************/
    div#department_list div.department_list_header {
        text-align: center;
    }

    div#department_list div.department_list_header h2 {
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
    }

    div.ui-popup-container, div.ui-popup {
        height: 98%;
        width: 100%;
        position: absolute;
        top: 0;
        left:0;
    }

    div#department_list div.department-container {
        width: 90%;
        padding-left: 1em;
        padding-right: 1em;
    }

    div#department_list div.department-container img.department-image {
        width: 3.125em;
        height: 3.125em;
        border-radius: 50%;
        position: relative;
        left: 0;
    }

    div#department_list div.department-container div.ui-checkbox {
        top: -2.0625em;
    }

    div#department_list div.department-container div.ui-checkbox input[type="checkbox"] {
       right: 0;
       left: initial;
    }

    div#department_list div.department-container span {
        position: relative;
        top: -1em;
        left: 2.1875em;
    }
</style>

<div class="new-message-wrapper">
	<div class="new-message-content">
        <div>
            <div class="img-container">
                <img class="" src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
                <span><?php echo$_SESSION["first_name"]. ' '.$_SESSION["last_name"]?></span>
            </div>

            <div class="text-area-container">
                <textarea class="createNewMessage_txtarea" placeholder="Enter Message Here"></textarea>
            </div>

            <div class="bottom-row">
                <div class="send-to-container">
                    <div class="send-to-text">
                        <i><strong>To: </strong><?php echo $_SESSION["department_desc"]; ?></i>
                    </div>
                    <div class="send-to-btn">
                        <button id="add_department_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                    </div>

                </div>

                <!--<div class="attach-container">
                    <div class="">
                        <span>Attach File</span>
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    </div>
                </div>-->
            </div>
        </div>
		<div class="col-xs-12 messageBtn-container">
			<button class="btn btn-default pull-left" type="button">Cancel</button>
			<button class="btn btn-default pull-right" type="button">Send</button>
            <input type="hidden" id="selected_departments" name="selected_departments">
		</div>
    </div>
    <div id="department_list" data-role="popup" data-transition="slidefade" data-dismissible="true">
        <div class="department_list_header">
            <h2>Select Departments</h2>
        </div>
        <hr/>
        <?php
            $recordDate = "";
            foreach ($departments['departments'] as $department):
        ?>
            <div class="department-container" data-department-id="<?php echo $department['department_id']; ?>">
                <img class="department-image" src="<?php echo base_url('assets/images/departments/'). $department['img_path'] ; ?>">
                <span class="department-desc"><?php echo $department['department_desc']; ?></span>
                <input class="department-chckbx" type="checkbox" data-department-id="<?php echo $department['department_id']; ?>" data-department-desc="<?php echo $department['department_desc']; ?>" />
            </div>
            <hr/>
        <?php endforeach; ?>
    </div><!-- /popup -->
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/views/messages/new_message_mobile.js"); ?>"></script>