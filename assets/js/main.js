
requirejs(["jquery-2.1.4.min"], function ($) {});

requirejs(["bootstrap.min"], function (bootstrap) {});

requirejs(["braintree-2.29.0.min"], function (braintree) {
	braintree.setup('', 'dropin', {
		container: ''
	});
});



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