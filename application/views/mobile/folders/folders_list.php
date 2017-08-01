<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="folder-list-wrapper">
		<div class="row newFolder-row">
			<div class="col-xs-12 folder-container">
				<span class="pull-left">Add New</span>
			</div>
		</div>
		<?php foreach ($userFolders as $userFolder):?>
			<div class="row folder-row">
				<div class="col-xs-12 folder-container">
					<span class="pull-left"><?php echo $userFolder['folder_name']; ?></span>
					<span class="pull-right glyphicon glyphicon-trash"></span>
				</div>
			</div>
	    <?php endforeach; ?>
	</div>