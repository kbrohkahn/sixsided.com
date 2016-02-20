$(document).ready(function() {
	$("#mobile-menu-icon").click(function(e) {
		e.preventDefault();
		if ($("#main-navbar").css("left") == "0px") {
			closeNavbar();
		} else {
			openNavbar();
		}
	});

	$("#vex-dex-headers-show").click(function(e) {
		e.preventDefault();
		if ($("#vex-dex-headers").css("display") == "none") {
			$("#vex-dex-headers").show(500);
		} else {
			$("#vex-dex-headers").hide(500);

		}
	});

	$("#content-cover").click(function() {
		closeNavbar();
	});

	$("#main-navbar span").hover(function() {
		$(this).children().addClass("animate-flip");
	});

	$("#main-navbar span").mouseleave(function() {
		$(this).children().removeClass("animate-flip");
	});



});

function closeNavbar() {
	$("#content-cover").hide();
	$("#main-navbar").animate({
		left: "calc(-240px - 2%)"

	}, 500, function() {
		$("#main-navbar").hide();
	});
}

function openNavbar() {
	$("#content-cover").show();
	$("#main-navbar").show();
	$("#main-navbar").animate({
		left: "0px"
	}, 500);
}