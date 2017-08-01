<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="messages-wrapper">
	<?php
		$recordDate = "";
		foreach ($userMessages as $userMessage):
	?>
		<?php if($userMessage['date_header'] != $recordDate){ ?>
			<div class="row headerDate">
				<h2><span><?php echo $userMessage['date_header']; ?></span></h2>
			</div>
			<?php $recordDate = $userMessage['date_header']; ?>
		<?php } ?>
		<div class="row message-row" data-msg="<?php echo $userMessage['message_id']; ?>" data-approved="<?php echo $userMessage['status']; ?>">
			<div class="col-xs-3 msg-sndr-img">
				<span class="helper"></span>
				<img class="profile-img" src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
			</div>
			<div class="col-xs-9 msg-content-wrapper">
				<div class="row">
					<div class="col-xs-12 msg-header">
						<span class="created_by"><?php echo $userMessage['emp_name']; ?></span>
						<span class="created_on"><?php echo $userMessage['created_on']; ?></ispan>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 msg-content ">
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
    <?php endforeach; ?>

	<form id="getMessage_frm" action="<?php echo base_url("Mobile/viewMessage/"); ?>" method="POST">
		<input id="selected_messageID" name="selected_messageID" type="hidden">
	</form>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/mobile/views/messages/messages.js"); ?>"></script>