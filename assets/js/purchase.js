$(document).ready(function() {
	$(".individual-deck-quantity").change(function() {
		if (!$(this).val()) {
			$(this).val(0);
		}

		// get total quantity
		var totalQuantity = 0;
		$(".individual-deck-quantity").each(function() {
			totalQuantity += parseInt($(this).val());
		});
		$("#individual-deck-total-quantity").html(totalQuantity);

		// get unit price, based on total quantity
		var unitPrice = 10;
		if (totalQuantity >= 10) {
			unitPrice = 8;
		} else if (totalQuantity >= 5) {
			unitPrice = 9;
		}
		$(".individual-deck-unit-price").html(unitPrice);

		// get total price
		var totalPrice = 0;
		$(".individual-deck-quantity").each(function() {
			var elementId = $(this).attr("id") + "-price";
			var quantity = parseInt($(this).val());

			$("#" + elementId).html(quantity * unitPrice);
			totalPrice += quantity * unitPrice;
		});
		$("#individual-deck-total-price").html(totalPrice);

		$("#total-price").html(totalPrice + parseInt($("#complete-deck-total-price").html()));

	});

	$(".complete-deck-quantity").change(function() {
		if (!$(this).val()) {
			$(this).val(0);
		}
		
		// get total quantity
		var totalQuantity = 0;
		$(".complete-deck-quantity").each(function() {
			totalQuantity += parseInt($(this).val());
		});
		$("#complete-deck-total-quantity").html(totalQuantity);

		// get total price
		var totalPrice = 0;
		$(".complete-deck-quantity").each(function() {
			var elementId = $(this).attr("id") + "-price";
			var quantity = parseInt($(this).val());

			$("#" + elementId).html(quantity * 40);
			totalPrice += quantity * 40;
		});
		$("#complete-deck-total-price").html(totalPrice);	

		$("#total-price").html(totalPrice + parseInt($("#individual-deck-total-price").html()));

	});

});
