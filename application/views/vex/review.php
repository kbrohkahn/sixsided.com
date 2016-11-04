<h1><?php echo $title; ?></h1>

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
		<?php if ($individual_deck_1 > 0): ?>
			<tr>
				<td>VEX DEX I</td>
				<td class="price"><?php echo $individual_deck_price ?></td>
				<td><?php echo $individual_deck_1 ?></td>
				<td class="price"><?php echo $individual_deck_1*$individual_deck_price ?></td>
			</tr>
		<?php endif;?>
		<?php if ($individual_deck_2 > 0): ?>
			<tr>
				<td>VEX DEX II</td>
				<td class="price"><?php echo $individual_deck_price ?></td>
				<td><?php echo $individual_deck_2 ?></td>
				<td class="price"><?php echo $individual_deck_2*$individual_deck_price ?></td>
			</tr>
		<?php endif;?>
		<?php if ($individual_deck_3 > 0): ?>
			<tr>
				<td>VEX DEX III</td>
				<td class="price"><?php echo $individual_deck_price ?></td>
				<td><?php echo $individual_deck_3 ?></td>
				<td class="price"><?php echo $individual_deck_3*$individual_deck_price ?></td>
			</tr>
		<?php endif;?>
		<?php if ($individual_deck_4 > 0): ?>
			<tr>
				<td>VEX DEX IV</td>
				<td class="price"><?php echo $individual_deck_price ?></td>
				<td><?php echo $individual_deck_4 ?></td>
				<td class="price"><?php echo $individual_deck_4*$individual_deck_price ?></td>
			</tr>
		<?php endif;?>
		<?php if ($individual_deck_5 > 0): ?>
			<tr>
				<td>VEX DEX V</td>
				<td class="price"><?php echo $individual_deck_price ?></td>
				<td><?php echo $individual_deck_5 ?></td>
				<td class="price"><?php echo $individual_deck_5*$individual_deck_price ?></td>
			</tr>
		<?php endif;?>
		<?php if ($complete_deck_1 > 0): ?>
			<tr>
				<td>Complete VEX DEX I</td>
				<td class="price">40</td>
				<td><?php echo $complete_deck_1 ?></td>
				<td class="price"><?php echo $complete_deck_1*40 ?></td>
			</tr>
		<?php endif;?>
		<?php if ($complete_deck_2 > 0): ?>
			<tr>
				<td>Complete VEX DEX II</td>
				<td class="price">40</td>
				<td><?php echo $complete_deck_2 ?></td>
				<td class="price"><?php echo $complete_deck_2*40 ?></td>
			</tr>
		<?php endif;?>
		<?php if ($complete_deck_3 > 0): ?>
			<tr>
				<td>Complete VEX DEX III</td>
				<td class="price">40</td>
				<td><?php echo $complete_deck_3 ?></td>
				<td class="price"><?php echo $complete_deck_3*40 ?></td>
			</tr>
		<?php endif;?>
		<?php if ($complete_deck_4 > 0): ?>
			<tr>
				<td>Complete VEX DEX IV</td>
				<td class="price">40</td>
				<td><?php echo $complete_deck_4 ?></td>
				<td class="price"><?php echo $complete_deck_4*40 ?></td>
			</tr>
		<?php endif;?>
		<?php if ($complete_deck_5 > 0): ?>
			<tr>
				<td>Complete VEX DEX V</td>
				<td class="price">40</td>
				<td><?php echo $complete_deck_5 ?></td>
				<td class="price"><?php echo $complete_deck_5*40 ?></td>
			</tr>
		<?php endif;?>
		<tr>
			<td></td>
			<td></td>
			<td>Subtotal</td>
			<td class="price"><?php echo $subtotal?></td>
		</tr>
		<tr>
			<td><?php if ($tax > 0) {echo 'Maryland has 5% sales tax';}?></td>
			<td></td>
			<td>Tax</td>
			<td class="price"><?php echo $tax ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Shipping</td>
			<td class="price"><?php echo $shipping ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><b>Total Order</b></td>
			<td class="price"><?php echo $subtotal + $tax + $shipping ?></td>
		</tr>
	</tbody>
</table>

<div class="row">
	<div class="col-sm-6 col-sm-offset-6">
		<h4 class='text-right'>Shipping info</h4>
		<table class="table">
			<tr>
				<td>Country</td>
				<td><?php echo $country ?></td>
			</tr>
			<tr>
				<td>State</td>
				<td><?php echo $state ?></td>
			</tr>
			<tr>
				<td>Other Country</td>
				<td><?php echo $other_country ?></td>
			</tr>
			<tr>
				<td>Other Country Mail</td>
				<td><?php echo $other_country_mail ?></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" class=" btn btn-primary">Submit Order</button></td>
			</tr>
		</table>
	</div>
</div>

<link href="/assets/css/purchase.css" rel="stylesheet">
