<!DOCTYPE HTML>
<html>
<head>
	<title>Six Sided Simulations</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta http-equiv="Content-Language" content="en">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/css/main.css" rel="stylesheet">
	<script src="/assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/js/main.js" type="text/javascript"></script>
</head>
<body>
	<div class="container-fluid" id="container">

		<div id="header" class="row">
			<div class="col-xs-12">
				<a href="#main-navbar" class="mobile-only" id="mobile-menu-icon"><i class="fa fa-bars fa-2x"></i></a>
				<a class="title" href="/">
					<div class="logo" alt="Your logo"></div>
				</a>
				
				<a class="flag-link" href="mailto:vex@sixsided.com">
						<img src="/assets/img/email.gif">
					<div>Email</div>
				</a>
				<a class="flag-link" id="flag-resources" href="/resources">
						<img src="/assets/img/Resources.gif">
					<div>Resources</div>
				</a>
				<a class="mobile-only flag-link" id="vex-dex-headers-show" href="#vex-dex-headers">
					<img src="/assets/img/ButtonV1o.gif">
					<div>VEX DEX</div>
				</a>
				<div id="vex-dex-headers">
					<a class="flag-link" href="/vex/vex1">
						<img src="/assets/img/ButtonV1o.gif">
						<div>VEX I</div>
					</a>
					<a class="flag-link" href="/vex/vex2">
						<img src="/assets/img/ButtonV2o.gif">
						<div>VEX II</div>
					</a>
					<a class="flag-link" href="/vex/vex3">
						<img src="/assets/img/ButtonV3o.gif">
						<div>VEX III</div>
					</a>
					<a class="flag-link" href="/vex/vex4">
						<img src="/assets/img/ButtonV4o.gif">
						<div>VEX IV</div>
					</a>
					<a class="flag-link" href="/vex/vex5">
						<img src="/assets/img/ButtonV5o.gif">
						<div>VEX V</div>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-3" id="main-navbar">
				<span class="mobile-only"><a href="#" id="close-navbar">Close Menu</a></span>
				<div>
					<span><?php echo anchor('/vex/', 'VEX');?></span>
					<span><?php echo anchor('/vex/purchase', 'Buy VEX');?></span>
					<span><?php echo anchor('/vex/about', 'About VEX');?></span>
					<span><?php echo anchor('/vex/designer_notes', 'Designer Notes');?></span>
					<span><?php echo anchor('/vex/challenges', 'VEX Challenges');?></span>
					<span><?php echo anchor('/sheets/', 'Flag Sheets');?></span>
					<span><?php echo anchor('/sheets/about', 'About Flag Sheets');?></span>
					<span><?php echo anchor('/sheets/purchase', 'Purchase Flag Sheets');?></span>
				</div>
			</div>
			<div class="col-sm-7" id="content">