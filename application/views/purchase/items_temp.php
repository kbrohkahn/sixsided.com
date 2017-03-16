<h1><?php echo $title; ?></h1>
<form class="form" action="/purchase/shipping" method="post" accept-charset="utf-8">
	<h4>Flag Sheets</h4>
	<em>$10 each</em>
	<table class="table purchase-table">
		<thead>
			<tr>
				<td>Sheet</td>
				<td>Add</td>
			</tr>
		</thead>
		<tbody id="flag-sheet-table-body">
			<tr>
				<td>
					<select class="form-control" id="flag-sheet-select">
						<?php foreach ($sheetItems as $sheetItem): ?>
							<option><?= $sheetItem["name"] . " - " .$sheetItem["scale"] . "mm" ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td>
					<button type="button" class="btn btn-success" onclick="addFlagSheet()">Add</button>
				</td>
			</tr>
		</tbody>
	</table>

	<h4>Individual VEX decks</h4>
	<em>Pricing</em>
	<ul>
		<li>1 to 4 total decks: 10$ each</li>
		<li>5 to 9 total decks: 9$ each</li>
		<li>10 or more total decks: 8$ each</li>
	</ul>
	<table class="table purchase-table">
		<thead>
			<tr>
				<td>Product</td>
				<td>Unit Price</td>
				<td>Quanity</td>
				<td>Price</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>VEX DEX I</td>
				<td class="individual-deck-unit-price price">10</td>
				<td><input name="individual-deck-1" id="individual-deck-1" class="form-control individual-deck-quantity" value=0 min=0 type="number"></td>
				<td id="individual-deck-1-price" class="individual-deck-price price">0</td>
			</tr>
			<tr>
				<td>VEX DEX II</td>
				<td class="individual-deck-unit-price price">10</td>
				<td><input name="individual-deck-2" id="individual-deck-2" class="form-control individual-deck-quantity" value=0 min=0 type="number"></td>
				<td id="individual-deck-2-price" class="individual-deck-price price">0</td>
			</tr>
			<tr>
				<td>VEX DEX III</td>
				<td class="individual-deck-unit-price price">10</td>
				<td><input name="individual-deck-3" id="individual-deck-3" class="form-control individual-deck-quantity" value=0 min=0 type="number"></td>
				<td id="individual-deck-3-price" class="individual-deck-price price">0</td>
			</tr>
			<tr>
				<td>VEX DEX IV</td>
				<td class="individual-deck-unit-price price">10</td>
				<td><input name="individual-deck-4" id="individual-deck-4" class="form-control individual-deck-quantity" value=0 min=0 type="number"></td>
				<td id="individual-deck-4-price" class="price">0</td>
			</tr>
			<tr>
				<td>VEX DEX V</td>
				<td class="individual-deck-unit-price price">10</td>
				<td><input name="individual-deck-5" id="individual-deck-5" class="form-control individual-deck-quantity" value=0 min=0 type="number"></td>
				<td id="individual-deck-5-price" class="price">0</td>
			</tr>
			<tr>
				<td>Individual Deck Total</td>
				<td class="individual-deck-unit-price price">10</td>
				<td id="individual-deck-total-quantity">0</td>
				<td id="individual-deck-total-price" class="price">0</td>
			</tr>
		</tbody>
	</table>

	<h4>Complete VEX decks (all 200 cards)</h4>
	<em>$40 each</em>
	<table class="table purchase-table">
		<thead>
			<tr>
				<td>Product</td>
				<td>Unit Price</td>
				<td>Quanity</td>
				<td>Price</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Complete VEX DEX I</td>
				<td class="price">40</td>
				<td><input name="complete-deck-1" id="complete-deck-1" class="form-control complete-deck-quantity" value=0 min=0 type="number"></td>
				<td id="complete-deck-1-price" class="complete-deck-price price">0</td>
			</tr>
			<tr>
				<td>Complete VEX DEX II</td>
				<td class="price">40</td>
				<td><input name="complete-deck-2" id="complete-deck-2" class="form-control complete-deck-quantity" value=0 min=0 type="number"></td>
				<td id="complete-deck-2-price" class="complete-deck-price price">0</td>
			</tr>
			<tr>
				<td>Complete VEX DEX III</td>
				<td class="price">40</td>
				<td><input name="complete-deck-3" id="complete-deck-3" class="form-control complete-deck-quantity" value=0 min=0 type="number"></td>
				<td id="complete-deck-3-price" class="complete-deck-price price">0</td>
			</tr>
			<tr>
				<td>Complete VEX DEX IV</td>
				<td class="price">40</td>
				<td><input name="complete-deck-4" id="complete-deck-4" class="form-control complete-deck-quantity" value=0 min=0 type="number"></td>
				<td id="complete-deck-4-price" class="complete-deck-price price">0</td>
			</tr>
			<tr>
				<td>Complete VEX DEX V</td>
				<td class="price">40</td>
				<td><input name="complete-deck-5" id="complete-deck-5" class="form-control complete-deck-quantity" value=0 min=0 type="number"></td>
				<td id="complete-deck-5-price" class="complete-deck-price price">0</td>
			</tr>
			<tr>
				<td>Complete Deck Total</td>
				<td class="price">40</td>
				<td id="complete-deck-total-quantity">0</td>
				<td id="complete-deck-total-price" class="price">0</td>
			</tr>
			<tr>
				<td><b>Total Price</b></td>
				<td></td>
				<td></td>
				<td id="total-price" class="price">0</td>
			</tr>
		</tbody>
	</table>
	
	<div class="form-group submit-button-container">
		<button type="submit" class="btn btn-primary">Enter Shipping</button>
	</div>
</form>

<script type="text/javascript" src="/assets/js/purchase.js"></script>
<link rel="stylesheet" href="/assets/css/purchase.css">