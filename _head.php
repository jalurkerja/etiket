<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="Grayrids">
	<title>CHR - Comprehensive Resume</title>
	<link rel="Shortcut Icon" href="https://dashboard.corphr.com/chr_dashboards/favicon.ico">

	<link rel="stylesheet" href="_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="_assets/css/line-icons.css">
	<link rel="stylesheet" href="_assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="_assets/css/owl.theme.default.css">
	<link rel="stylesheet" href="_assets/css/slicknav.min.css">
	<link rel="stylesheet" href="_assets/css/animate.css">
	<link rel="stylesheet" href="_assets/css/main.css">
	<link rel="stylesheet" href="_assets/css/responsive.css">
	<!--#ff981a -->
	<style>
		.top-nav-collapse .navbar-nav li.active a.nav-link {
			color: #1CB9F7 !important;
		}

		.navbar li.active a.nav-link {
			color: #1CB9F7;
		}

		.back-to-top,
		.btn-za,
		.slicknav_btn {
			background: #1CB9F7;
		}

		#copyright,
		.custom-file-label::after {
			background-color: #1CB9F7;
		}

		.post-header a,
		.navbar-expand-lg .navbar-nav li a:hover,
		.navbar-expand-lg .navbar-nav li .active>a,
		.navbar-expand-lg .navbar-nav li a:focus {
			color: #1CB9F7;
		}

		a {
			color: #1CB9F7;
		}

		input:focus,
		textarea:focus,
		select:focus,
		option:focus {
			outline: none !important;
			border-color: #1CB9F7 !important;
			box-shadow: 0 0 10px #719ECE;
		}


		/* ---- Start The Modals Notification ---- */

		/* The Modal (background) */
		.modal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			padding-top: 20%;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 63%;
		}

		#label_notification {
			text-align: center;
		}

		/* The Close Button */
		.close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		/* ---- End The Modals Notification ---- */

		/* ---- Start The Loader Color ---- */
		#loader-1:before {
			border-top-color: #1CB9F7 !important;
		}

		/* ---- End The Loader Color ---- */
	</style>
</head>

<body>
	<?php
	$__phpself 					= basename($_SERVER["PHP_SELF"]);
	$__http_referer 			= basename($_SERVER["HTTP_REFERER"]);
	$__base_url 				= basename($_SERVER["PHP_SELF"]) . "?" . $_SERVER["QUERY_STRING"];
	$__PT 						= str_replace("trial_", "", explode("/", $_SERVER["PHP_SELF"])[1]);

	?>
	<script>
		function isNumberKey(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			return true;
		}

		function isAlphabetsKey(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return true;

			return false;
		}
	</script>