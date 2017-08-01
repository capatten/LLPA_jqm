<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
	div.top-wrapper {
		width: 100%;
		background-color: #C1C1C1;
	}

	div.top-wrapper div.top-container {
		width: 100%;
		display: inline-block;
		padding: 0px 15px;
	}

	div.top-wrapper div.top-container img.top-logo {
		float: left;
		height: 40px;
	}

	div.top-wrapper div.top-container div.top-search-container {
		float: right;
		width: 218px;
    	height: 40px;
	}

	div.top-wrapper div.top-container div.top-search-container input {
		margin-top: 5px;
	    margin-bottom: 5px;
	    border-radius: 10px;
	    padding: 6px 12px 6px 30px;
	}

	/* enable absolute positioning */
	.inner-addon {
	    position: relative;
	}

	/* style icon */
	.inner-addon .glyphicon {
	  position: absolute;
	  padding: 14px 10px;
	  pointer-events: none;
	}

	/* align icon */
	.left-addon .glyphicon  { left:  0px;}
	.right-addon .glyphicon { right: 0px;}

	/* add padding  */
	.left-addon input  { padding-left:  30px; }
	.right-addon input { padding-right: 30px; }
</style>

<div class="top-wrapper">
	<div class="top-container">
		<img src="#"  class="top-logo"/>
		<div class="top-search-container inner-addon left-addon">
			<i class="glyphicon glyphicon-search"></i>
			<input class="form-control">
		</div>
	</div>
</div>