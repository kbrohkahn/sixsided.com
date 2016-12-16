<form class="form" action="/purchase/complete" method="post" accept-charset="utf-8">
	<h4>Payment Info <small>Processed by Braintree</small></h4>
	<div id="braintree-dropin-container"></div>
	
	<div class="form-group submit-button-container">
		<button type="submit" class="btn btn-primary">Submit Order</button>
	</div>

	<div class='hidden'>
		<input name="first-name" value="<?= $firstName ?>">
		<input name="last-name" value="<?= $lastName ?>">
		<input name="address" value="<?= $address ?>">
		<input name="address-line-2" value="<?= $addressLine2 ?>">
		<input name="city" value="<?= $city ?>">
		<input name="state" value="<?= $state ?>">
		<input name="zip" value="<?= $zip ?>">
		<input name="country" value="<?= $country ?>">
		<input name="email" value="<?= $email ?>">
		
		<input name="total" value=<?= $total ?>>
		
		<input name="individual-deck-1" value=<?= $individual_deck_1 ?>>
		<input name="individual-deck-2" value=<?= $individual_deck_2 ?>>
		<input name="individual-deck-3" value=<?= $individual_deck_3 ?>>
		<input name="individual-deck-4" value=<?= $individual_deck_4 ?>>
		<input name="individual-deck-5" value=<?= $individual_deck_5 ?>>
		<input name="complete-deck-1" value=<?= $complete_deck_1 ?>>
		<input name="complete-deck-2" value=<?= $complete_deck_2 ?>>
		<input name="complete-deck-3" value=<?= $complete_deck_3 ?>>
		<input name="complete-deck-4" value=<?= $complete_deck_4 ?>>
		<input name="complete-deck-5" value=<?= $complete_deck_5 ?>>

		<?php 
			for ($i = 0; $i < 100; $i++) {
				if ($flag_sheets[$i] !== null) {
					echo "<input name='sheet-item-". $i ."' value='" . $flag_sheets[$i] . "'>";
				}
			}
		?>
	</div>
	
</form>

<script type="text/javascript">
	setupBraintreeWithPaypal(<?= $total ?>, <?php echo '"'.BRAINTREE_CLIENT_TOKEN.'"' ?>);
</script>
