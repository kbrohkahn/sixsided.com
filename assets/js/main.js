$(document).ready(function() {
	$("#right-footer-desktop-rotated").css({
		"height": $("#right-footer-desktop").css("width"),
		"width": $("#content").css("height")
	});

	$("#mobile-menu-icon").click(function(e) {
		e.preventDefault();
		openNavbar();
	});

	$("#close-navbar").click(function(e) {
		e.preventDefault();
		closeNavbar();
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

	$("#content-cover").on({'touchstart': function() {
		closeNavbar();
	}});

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
		left: "-240px"
	}, 500);
}

function openNavbar() {
	$("#content-cover").show();
	$("#main-navbar").animate({
		left: "0px"
	}, 500);
}