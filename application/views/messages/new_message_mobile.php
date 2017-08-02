<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url('assets/css/views/messages/new_message_mobile.css'); ?>" />

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