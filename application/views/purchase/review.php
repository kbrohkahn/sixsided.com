<h1><?= $title ?></h1>

<form class="review-form">
	<table class="table purchase-table ">
		<thead>
			<tr>
				<td>Product</td>
				<td>Unit Price</td>
				<td>Quanity</td>
				<td>Price</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($flag_sheets as $flag_sheet): ?>
				<tr>
					<td><?= $flag_sheet ?></td>
					<td class="price">10</td>
					<td>1</td>
					<td class="price">10</td>
				</tr>
			<?php endforeach; ?>

			<?php if ($individual_deck_1 > 0): ?>
				<tr>
					<td>VEX DEX I</td>
					<td class="price"><?= $individual_deck_price ?></td>
					<td><?= $individual_deck_1 ?></td>
					<td class="price"><?= $individual_deck_1*$individual_deck_price ?></td>
				</tr>
			<?php endif;?>
			<?php if ($individual_deck_2 > 0): ?>
				<tr>
					<td>VEX DEX II</td>
					<td class="price"><?= $individual_deck_price ?></td>
					<td><?= $individual_deck_2 ?></td>
					<td class="price"><?= $individual_deck_2*$individual_deck_price ?></td>
				</tr>
			<?php endif;?>
			<?php if ($individual_deck_3 > 0): ?>
				<tr>
					<td>VEX DEX III</td>
					<td class="price"><?= $individual_deck_price ?></td>
					<td><?= $individual_deck_3 ?></td>
					<td class="price"><?= $individual_deck_3*$individual_deck_price ?></td>
				</tr>
			<?php endif;?>
			<?php if ($individual_deck_4 > 0): ?>
				<tr>
					<td>VEX DEX IV</td>
					<td class="price"><?= $individual_deck_price ?></td>
					<td><?= $individual_deck_4 ?></td>
					<td class="price"><?= $individual_deck_4*$individual_deck_price ?></td>
				</tr>
			<?php endif;?>
			<?php if ($individual_deck_5 > 0): ?>
				<tr>
					<td>VEX DEX V</td>
					<td class="price"><?= $individual_deck_price ?></td>
					<td><?= $individual_deck_5 ?></td>
					<td class="price"><?= $individual_deck_5*$individual_deck_price ?></td>
				</tr>
			<?php endif;?>
			<?php if ($complete_deck_1 > 0): ?>
				<tr>
					<td>Complete VEX DEX I</td>
					<td class="price">40</td>
					<td><?= $complete_deck_1 ?></td>
					<td class="price"><?= $complete_deck_1*40 ?></td>
				</tr>
			<?php endif;?>
			<?php if ($complete_deck_2 > 0): ?>
				<tr>
					<td>Complete VEX DEX II</td>
					<td class="price">40</td>
					<td><?= $complete_deck_2 ?></td>
					<td class="price"><?= $complete_deck_2*40 ?></td>
				</tr>
			<?php endif;?>
			<?php if ($complete_deck_3 > 0): ?>
				<tr>
					<td>Complete VEX DEX III</td>
					<td class="price">40</td>
					<td><?= $complete_deck_3 ?></td>
					<td class="price"><?= $complete_deck_3*40 ?></td>
				</tr>
			<?php endif;?>
			<?php if ($complete_deck_4 > 0): ?>
				<tr>
					<td>Complete VEX DEX IV</td>
					<td class="price">40</td>
					<td><?= $complete_deck_4 ?></td>
					<td class="price"><?= $complete_deck_4*40 ?></td>
				</tr>
			<?php endif;?>
			<?php if ($complete_deck_5 > 0): ?>
				<tr>
					<td>Complete VEX DEX V</td>
					<td class="price">40</td>
					<td><?= $complete_deck_5 ?></td>
					<td class="price"><?= $complete_deck_5*40 ?></td>
				</tr>
			<?php endif;?>
			<tr>
				<td></td>
				<td></td>
				<td>Subtotal</td>
				<td class="price"><?= $subtotal?></td>
			</tr>
			<tr>
				<td><?php if ($tax > 0) {echo 'Maryland has 5% sales tax';}?></td>
				<td></td>
				<td>Tax</td>
				<td class="price"><?= $tax ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>Shipping</td>
				<td class="price"><?= $shipping ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><b>Total Order</b></td>
				<td class="price"><?= $total ?></td>
			</tr>
		</tbody>
	</table>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-6">
			<h4 class='text-right'>Shipping info</h4>
			<table class="table">
				<tr>
					<td>Country</td>
					<td><?= $country ?></td>
				</tr>
				<tr>
					<td>State</td>
					<td><?= $state ?></td>
				</tr>
				<tr>
					<td>Other Country</td>
					<td><?= $other_country ?></td>
				</tr>
				<tr>
					<td>Other Country Mail</td>
					<td><?= $other_country_mail ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>


	<div id="braintree-dropin-container"></div>
	<button type="submit" class="btn btn-primary">Submit Order</button>
</form>

<link rel="stylesheet" href="/assets/css/purchase.css">
<script type="text/javascript">
    setupBraintreeWithPaypal(<?= $total ?>, <?php echo '"'.BRAINTREE_CLIENT_TOKEN.'"' ?>);
</script>
