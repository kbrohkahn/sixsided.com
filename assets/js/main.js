requirejs.config({
	paths: {
		"jquery": "jquery-2.1.4.min",
		"bootstrap": "bootstrap.min",
		"braintree": "braintree-2.29.0.min"
	},
	shim: {
		"bootstrap": {
			deps: ["jquery"]
		}
	}
});

requirejs(["jquery", "braintree"], function ($, braintree) {
	$(document).ready(function() {
		/* 
		braintree.setup('', 'dropin', {
			container: ''
		});
		*/
		require(['purchase']);
	});
});

requirejs(["bootstrap"], function () {});

function closeNavbar() {
	$("#content-cover").hide();
	$("#main-navbar").animate({
		left: "-240px"
	}, 500);
}

function openNavbar() {
	$("#content-cover").show();
	$("#main-navbar").animate({
		left: "0px"
	}, 500);
}

function toggleVexDexHeaders() {
	if ($("#vex-dex-headers").css("display") == "none") {
		$("#vex-dex-headers").show(500);
	} else {
		$("#vex-dex-headers").hide(500);
	}
}
