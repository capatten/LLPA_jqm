<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LLPA Employee App</title>
	</head>
	<body>
		<!-- FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" />

		<!-- JQUERY -->
	 	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

		<!--- CUSTOM CSS --->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/views/layout/default_mobile.css"); ?>" />

		<div data-role="page" id="jqm-page">
	        <div data-role="header" data-position="fixed">
	            <?php $this->load->view($menuPage); ?>
	        </div><!-- /header -->

	        <div role="main" class="ui-content">
	            <?php $this->load->view($contentPage); ?>
	        </div><!-- /content -->

	        <div data-role="footer" data-position="fixed">
	            <?php $this->load->view($navigation); ?>
	        </div><!-- /footer -->
		</div>

		<script type="text/javascript" src="<?php echo base_url("assets/js/views/layout/default_mobile.js"); ?>"></script>
	</body>
</html>