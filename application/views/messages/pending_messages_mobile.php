<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/messages/messages_mobile.css"); ?>" />

<div class="messages-wrapper">
	<div class="messages-content">
		<?php
			$recordDate = "";
			foreach ($content['userMessages'] as $userMessage):
		?>

		<?php if($userMessage['date_header'] != $recordDate){ ?>
			<div class="headerDate">
				<h2><span><?php echo $userMessage['date_header']; ?></span></h2>
			</div>
			<?php $recordDate = $userMessage['date_header']; ?>
		<?php } ?>
			<div class="message-row" data-msg="<?php echo $userMessage['message_id']; ?>">
				<div class="message-row-content">
				<div class="msg-sndr-img">
					<img class="profile-img" src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
				</div>
				<div class="msg-content-wrapper">
					<div class="msg-content">
						<div class="msg-header">
							<span class="created_by"><?php echo $userMessage['emp_name']; ?></span>
							<span class="created_on"><?php echo $userMessage['created_on']; ?></span>
						</div>
						<div class="msg">
							<span class=""><?php echo $userMessage['message']; ?></span>
						</div>
					</div>
					<?php if($userMessage['attachment']){ ?>
						<div class="row">
							<div class="col-xs-12 msg-attachment">
								<span class="attachment glyphicon glyphicon-paperclip"></span>
							</div>
						</div>
					<?php } ?>
				</div>
				</div>
			</div>
    	<?php endforeach; ?>

		<form id="getPendingMessage_frm" action="<?php echo base_url("Messages/Full_Pending_Message"); ?>" method="POST">
			<input id="selected_pending_messageID" name="selected_pending_messageID" type="hidden">
		</form>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/views/messages/pending_messages_mobile.js"); ?>"></script>