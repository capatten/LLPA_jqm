<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="profile-wrapper">
	<div class="container-fluid">
		<div class="row profile-title">
			<div class="col-xs-12">
				<h1><?php echo $profileData[0]['title_desc']; ?></h1>
			</div>
		</div>
		<div class="row profile-details-wrapper">
			<div class="col-xs-12">
				<div class="container-fluid profile-details">
					<div class="row">
						<div class="col-xs-12 profile-data">
							<img src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
							<div class="profile-row">
								<div class="row">
									<div class="col-xs-12 profile-name">
										<h2><?php echo $profileData[0]['emp_name']; ?></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 profile-email">
										<h2><i><?php echo $profileData[0]['email_address']; ?></i></h2>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 dept-logo">
										<hr/>
										<img src="#">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 profile-fav-color">
										<h2>Favorite Color:<strong><input value="[Favorite Color]"></strong></h2>
									</div>
									<div class="col-xs-12 profile-fav-color">
										<h2>Favorite Animal:<strong>[Favorite Animal]</strong></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>