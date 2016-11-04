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
	<script data-main="/assets/js/main.js" src="/assets/js/require.js" type="text/javascript" async></script>
</head>
<body>
	<div class="container-fluid" id="container">

		<div id="header" class="row">
			<div class="col-xs-12">
				<a class="mobile-only" href="#main-navbar" onclick="openNavbar();"><i class="fa fa-bars fa-2x"></i></a>
				<a class="title" href="/">
					<div class="logo" alt="Your logo"></div>
				</a>
				
				<a class="flag-link" href="mailto:<?php echo EMAIL?> ">
						<img src="/assets/img/email.gif">
					<div>Email</div>
				</a>
				<a class="flag-link" id="flag-resources" href="/resources">
						<img src="/assets/img/Resources.gif">
					<div>Resources</div>
				</a>
				<a class="mobile-only flag-link" href="#vex-dex-headers" onclick="toggleVexDexHeaders()">
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

		<div class="row" id="content-container">
			<div class="col-sm-3" id="main-navbar">
				<span class="mobile-only" href="#" onclick="closeNavbar();">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-close" aria-hidden="true"></i></td>
							<td>Close Menu</td>
						</tr>
					</table>
				</span>

				<a href="/vex">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-id-card" aria-hidden="true"></i></td>
							<td>VEX</td>
						</tr>
					</table>
				</a>
				<a href="/vex/purchase">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-dollar" aria-hidden="true"></i></td>
							<td>Buy VEX</td>
						</tr>
					</table>
				</a>
				<a href="/vex/about">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-info" aria-hidden="true"></i></td>
							<td>About VEX</td>
						</tr>
					</table>
				</a>
				<a href="/vex/designer_notes">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-sticky-note" aria-hidden="true"></i></td>
							<td>Designer Notes</td>
						</tr>
					</table>
				</a>
				<a href="/vex/challenges">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-puzzle-piece" aria-hidden="true"></i></td>
							<td>VEX Challenges</td>
						</tr>
					</table>
				</a>
				<a href="/sheets">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-flag" aria-hidden="true"></i></td>
							<td>Flag Sheets</td>
						</tr>
					</table>
				</a>
				<a href="/sheets/about">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-info" aria-hidden="true"></i></td>
							<td>About Flag Sheets</td>
						</tr>
					</table>
				</a>
				<a href="/sheets/purchase">
					<table>
						<tr>
							<td><i class="fa fa-2x fa-dollar" aria-hidden="true"></i></td>
							<td>Purchase Flag Sheets</td>
						</tr>
					</table>
				</a>
			</div>
			<div class="col-sm-7" id="content">