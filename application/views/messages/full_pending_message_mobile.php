<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/messages/full_message_mobile.css"); ?>" />

<div id="full-message" class="full-message-wrapper" data-message-id="<?php echo $content['message_id']; ?>">
	<div class="full-message-content">
		<div class="message-header">
			<div class="profile-img-wrapper">
				<div class="profile-img-container">
					<img class="profile-img" src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
				</div>
			</div>
			<div class="header-details-wrapper">
				<div class="header-details-container">
					<span><?php echo $content['emp_name']; ?></span>
					<br/>
					<span><?php echo $content['created_date']; ?> <?php echo $content['created_time']; ?></span>
				</div>
			</div>
		</div>
		<hr/>
		<div class="message-details">
			<p><?php echo $content['message']; ?></p>
		</div>

		<?php if($content['attachment'] > 0){ ?>
			<div class="attachment-details">
				<i class="viewAttachment">View Attachment</i>
				<div class="icon-container">
					<i class="fa fa-picture-o" aria-hidden="true"></i>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php if($content['msg_status'] == 0 && $_SESSION['title_desc'] == 'Admin'){ ?>
		<div class="message-status">
		    <i class="fa fa-arrow-left" aria-hidden="true"></i><span>Swipe <strong>left</strong> to Decline / <strong>right</strong> to Accept</span><i class="fa fa-arrow-right" aria-hidden="true"></i>
		</div>
	<?php } ?>

</div>

<div id="confirm" data-role="popup" data-transition="slidefade" data-dismissible="false">
	<p id="question">Why was the message Declined</p>
	<div class="textarea-container">
		<textarea id="decline_txt"></textarea>
	</div>
	<div class="buttons-container">
		<button id="decline_submit" data-message-id="<?php echo $content['message_id']; ?>">Submit</button>
		<a href="#" data-rel="back" class="cancel-btn"><button>Cancel</button></a>
	</div>
</div><!-- /popup -->


<script type="text/javascript" src="<?php echo base_url("assets/js/views/messages/full_pending_message_mobile.js"); ?>"></script>