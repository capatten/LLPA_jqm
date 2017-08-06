<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/navigation/navigation_mobile.css"); ?>" />

<div class="navigation-wrapper">
	<div class="navigation-container">
		<div class="navigation-item" style="position: relative;">
			<a href="<?php echo base_url("Messages/Pending_Messages"); ?>" style="position: relative;">
                <img alt="Pending Messages" class="nav-icon <?php echo $pending_message_count[0]['pending_count'] ?>" src="
                <?php
                    if($menu['activePage'] != "Pending Messages"){
                        echo base_url("assets/images/icons/newsize_white.png");
                    }else{
                        echo base_url("assets/images/icons/newsize_orange.png");
                    }
                ?>
                "/>
				<?php if($pending_message_count[0]['pending_count'] > 0) { ?>
					<div class="pending-count" ><?php echo $pending_message_count[0]['pending_count'] ?></div>
				<?php } ?>
			</a>
		</div>
		<div class="navigation-item">
			<a href="<?php echo base_url("Messages/New_Message"); ?>"><img alt="New Message" class="nav-icon" src="
			<?php
                if($menu['activePage'] != "New Message"){
                    echo base_url("assets/images/icons/Nav_New Message.png");
                }else{
                    echo base_url("assets/images/icons/createNew_orange.png");
                }
            ?>
            "/></a>
		</div>
		<div class="navigation-item home-btn">
            <div class="home-btn">
                <a href="<?php echo base_url("Messages/"); ?>"><img alt="Home" class="nav-icon" src="
                    <?php
                        if($menu['activePage'] != "Messages"){
                            echo base_url("assets/images/icons/Nav_Home.png");
                        }else{
                            echo base_url("assets/images/icons/Home_orange.png");
                        }
                    ?>
                "/></a>
            </div>
		</div>
		<div class="navigation-item">
            <a href="<?php echo base_url("Folders/"); ?>"><img alt="Folders" class="nav-icon" src="
                <?php
                    if($menu['activePage'] != "Folders"){
                        echo base_url("assets/images/icons/Nav_Folders.png");
                    }else{
                        echo base_url("assets/images/icons/Folder_orange.png");
                    }
                ?>
            "/></a>
		</div>
		<div class="navigation-item">
            <a href="<?php echo base_url("Profile/"); ?>"><img alt="Profile" class="nav-icon" src="
                <?php
                if($menu['activePage'] != "Folders"){
                    echo base_url("assets/images/icons/Nav_Profile.png");
                }else{
                    echo base_url("assets/images/icons/Profile_orange.png");
                }
                ?>
            "/></a>
		</div>
	</div>
</div>