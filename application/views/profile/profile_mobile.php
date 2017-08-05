<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="profile-wrapper">
	<div class="profile-container">
		<div class="profile-title">
			<div>
				<h1><?php echo $content['userProfile'][0]['title_desc']; ?></h1>
			</div>
		</div>
		<div class="profile-details-wrapper">
            <div class="profile-details-container profile-details">
                <div class="profile-data">
                    <img src="<?php echo base_url('assets/images/') .'default.jpg'; ?>">
                    <div class="profile-row">
                        <div class="profile-name">
                            <h2><?php echo $content['userProfile'][0]['emp_name']; ?></h2>
                        </div>
                        <div class="">
                            <div class="profile-email">
                                <h2><i><?php echo $content['userProfile'][0]['email_address']; ?></i></h2>
                            </div>
                        </div>
                        <div class="dept-logo">
                            <hr/>
                            <img src="#">
                        </div>
                        <div class="profile-fav-color" data-role="fieldcontain">
                            <label for="name">Favorite Color:</label>
                            <input id="name" value="[Favorite Color]" />
                        </div>
                        <div class=" profile-fav-color">
                            <h2>Favorite Animal:<strong>[Favorite Animal]</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>