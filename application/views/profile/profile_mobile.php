<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    div.profile-wrapper div.profile-container div.profile-title {
        text-align: center;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data {
        text-align: center;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data img {
        width: 10em;
        height: auto;
        border-radius: 50%;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data h2 {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.profile-email h2 {
        margin-top: 0px;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.dept-logo {
        height: 35px;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.dept-logo hr {
        margin-top: 3em;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.dept-logo img {
        width: 4em;
        position: relative;
        top: -40px;
        background-color: white;
    }

    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.profile-fav-color,
    div.profile-wrapper div.profile-container div.profile-details-wrapper div.profile-details-container div.profile-data div.profile-fav-animal {
        text-align: left;
        border-bottom: none;
    }
</style>

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
                    <img src="<?php echo base_url('assets/images/') .$content['userProfile'][0]['emp_id'] .'.jpg'; ?>">
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
                            <img src="<?php echo base_url('assets/images/departments/') .$_SESSION["department_desc"] .'.png'; ?>">
                        </div>
                        <div class="profile-fav-color" data-role="fieldcontain">
                            <label for="name">Favorite Color:</label>
                            <input id="name" value="[Favorite Color]" />
                        </div>
                        <div class="profile-fav-animal" data-role="fieldcontain">
                            <label for="name">Favorite Animal:</label>
                            <input id="name" value="[Favorite Animal]" />
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>