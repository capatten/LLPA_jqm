<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    div.team-wrapper div.team-container div.team-members {
        width: 100%;
    }

    div.team-wrapper div.team-container div.team-title h1 {
        text-align: center;
    }

    div.team-wrapper div.team-container div.team-members div.team-member {
        margin-left: 0.5em;
        margin-right: 0.5em;
        border: 0.0625em solid #000000;
        margin-bottom: 0.5em;
    }

    div.team-wrapper div.team-container div.team-members div.team-member div.profile-img-container {
        width: 4em;
        display: inline-block;
    }

    div.team-wrapper div.team-container div.team-members div.team-member div.profile-img-container img.profile-img {
        width: 3em;
        float: left;
        margin-left: .25em;
        margin-top: .25em;
        border-radius: 50%;
    }

    div.team-wrapper div.team-container div.team-members div.team-member div.member-details-container {
        display: inline-block;
        position: relative;
        top: -6px;
    }

    div.team-wrapper div.team-container div.team-members div.team-member div.member-details-container span.member-name {
        font-size: 1em;
        font-weight: bold;
    }

    div.team-wrapper div.team-container div.team-members div.team-member div.member-details-container span.member-title {
        padding-left: 1em;
    }
</style>

<div class="team-wrapper">
    <div class="team-container">
        <div class="team-title">
            <h1><?php echo $_SESSION["department_desc"] ?></h1>
        </div>

        <div class="team-members">
            <?php foreach ($content['userTeam'] as $teamMember):?>
                <div class="team-member">
                    <div class="profile-img-container">
                        <img class="profile-img" src="<?php echo base_url('assets/images/') .$teamMember['emp_id'].'.jpg'; ?>">
                    </div>
                    <div class="member-details-container">
                        <span class="member-name"><?php echo $teamMember['emp_name']; ?></span><br/>
                        <span class="member-title"><?php echo $teamMember['title_desc']; ?></span><br/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
