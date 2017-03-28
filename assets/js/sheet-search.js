
function sheetEraSelectChanged() {
	$("#sheet-era-input").val($("#sheet-era-select option:selected").text());
	// $("#sheet-type-input").val("");

	$(".sheet-type-select").hide();
	var value = $("#sheet-era-select").val();
	if (value == "") {
		$("#default-type-select").show();
	} else {
		$("#" + value).show();
	}

	updateVisibleSheets();

}

function sheetTypeSelectChanged(element) {
	$("#type-input").val(element.value);
	updateVisibleSheets();
}

function updateVisibleSheets() {
	var filteredScaleSelect = "";

	var currentScale = $("#scale-select").val();
	alert(currentScale);
	if (currentScale != "") {
		$(".sheet-item:not(.scale-" + currentScale + ")").hide();
		filteredScaleSelect += " .scale-" + currentScale;
	}

	var currentCentury = $("#century-select").val();
	if (currentCentury != "") {
		$(".sheet-item:not(.century-" + currentCentury + ")").hide();
		filteredCenturySelect += " .century-" + currentCentury;
	}

	var currentEra = $("#era-select").val();
	if (currentEra != "") {
		$(".sheet-item:not(.era-" + currentEra + ")").hide();
		filteredEraSelect += " .era-" + currentEra;
	}

	var currentType = $("#type-input").val();
	if (currentType != "") {
		$(".sheet-item:not(.type-" + currentType + ")").hide();
		filteredTypeSelect += " .type-" + currentType;
	}

	if (filteredScaleSelect != "") {
		$(filteredScaleSelect).show();
	}
}

function resetSearch() {
	$("#sheet-era-input").val("");
	$("#sheet-type-input").val("");
	$("#sheet-century-select").val("");
	$("#sheet-scale-select").val("");

	// $("#form-sheet-search").submit();
}

$("#sheet-scale-select").change(function(e) {
	alert($(this).val());
});


