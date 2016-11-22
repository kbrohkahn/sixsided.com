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

function sheetEraSelectChanged(element) {
	$("#sheet-era-input").val($("#sheet-era-select option:selected").text());
	$("#sheet-type-input").val("All");

	$(".sheet-type-select").hide();
	var value = $("#sheet-era-select").val();
	if (value == "All") {
		$("#default-type-select").show();
	} else {
		$("#" + value).show();
	}
}

function sheetTypeSelectChanged(element) {
	$("#sheet-type-input").val(element.value);
}

function resetSearch() {
	$("#sheet-era-input").val("All");
	$("#sheet-type-input").val("All");
	$("#sheet-year-select").val("All");
	$("#sheet-scale-select").val("All");

	$("#form-sheet-search").submit();
}

function setupBraintreeWithPaypal(amount) {
	var clientToken = BRAINTREE_CLIENT_TOKEN;
	braintree.setup(clientToken, 'dropin', {
		container: 'braintree-dropin-container',
		paypal: {
			singleUse: true,
			amount: amount,
			currency: 'USD'
		}
	});
}