<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/views/menus/menu.css"); ?>" />

<div class="menu-wrapper">
	<div class="menu-container">
		<div class="activePage">
			<?php if($menu['activePage'] != "Messages"){?>
				<a class="menu-back" href="javascript:history.back()">
					<img alt="back icon" class="back-btn" src="<?php echo base_url("assets/images/icons/ArrowLeft_Orange.png"); ?>" />
					<span class="back-btn-label">Back</span>
				</a>
			<?php } ?>

			<?php echo $menu['activePage'];?>
			<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
			<div class="menuOptions">
				<ul>
					<li><a href="<?php echo base_url("Team/"); ?>">Team</a></li>
					<li><a href="<?php echo base_url("Log Out/"); ?>">Log Out</a></li>
		    	</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/views/menus/menu_no_back_mobile.js"); ?>"></script>