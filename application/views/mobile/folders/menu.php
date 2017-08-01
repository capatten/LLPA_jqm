<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="menu-wrapper">
	<div class="menu-container container-fluid">
		 <div class="row">
		 	<div class="col-xs-4 left-content" onclick="window.history.back();">
				<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
			</div>
			<div class="col-xs-4 center-content">
				<div class="activePage"><?php echo $activePage;?></div>
			</div>
			<div class="col-xs-4 right-content">
				<div class="right-icons dropdown">
					<!--- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> --->
					<span class="dropdown-toggle glyphicon glyphicon-option-vertical" id="optionsMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></span>
					<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="optionsMenu">
						<?php foreach ($menuOptions as $menuOption):?>
							<li>
								<a href="<?php echo base_url($menuOption['menu_option_path']); ?>"><?php echo $menuOption['menu_option_desc']; ?></a>
							</li>
				    	<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>