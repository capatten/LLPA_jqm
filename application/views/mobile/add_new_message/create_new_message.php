<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="createNewMessage-wrapper">
	<div class="createNewMessage-container container-fluid">
		<div class="row">
			<div class="container-fluid">
				<div class="col-xs-12 messageText-container">
					<div class="row">
						<div class="col-xs-4">
							<div class="profile-img-container">
								<img class="profile-img" src="<?php echo base_url('assets/images/') . $userID . '.jpg'; ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<textarea class="createNewMessage_txtarea" placeholder="Enter Message Here"></textarea>
						</div>
					</div>

					<div class="row newMessageFooter">
						<div class="col-xs-6">
							<span><i><strong>To: </strong><?php echo $department ?></i></span>
							<div class="add-department_btn pull-right">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</div>
						</div>

						<div class="col-xs-6">
							<div class="attach_btn pull-right">
								<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 messageBtn-container">
				<button class="btn btn-default pull-left"type="button">Cancel</button>
				<button class="btn btn-default pull-right"type="button">Send</button>
			</div>
		</div>
	</div>
</div>