<h1><?php echo $title; ?></h1>

<form class="form-horizontal" action="http://daniel.broh-kahn.com/vex/review" method="post" accept-charset="utf-8">
	<h4>Individual decks</h4>

	<em>Pricing</em>
	<ul>
		<li>1 to 4 total decks: 10$ each</li>
		<li>5 to 9 total decks: 9$ each</li>
		<li>10 or more total decks: 8$ each</li>
	</ul>

	<table class="table">
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

	<h4>Complete decks (all 200 cards)</h4>
	<table class="table">
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

	<h4>Shipping, Handling, and Tax</h4>
	<div class="form-group">
		<label for="country" class="col-sm-6 control-label">Select Country</label>
		<div class="col-sm-6">
			<select class="form-control" id="country" name="country">
				<option>US</option>
				<option>Canada</option>
				<option>Other</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="state" class="col-sm-6 control-label">
			US State or Canadian Province
			<p class="help-block">(Maryland adds 5% Sales Tax)</p>
		</label>
		<div class="col-sm-6">
			<select class="form-control" id="state" name="state">
				<option value="Not US or Canada">Not US or Canada</option>
				<option value="AK">Alaska</option>
				<option value="AL">Alabama</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="DC">Washington D.C.</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NF">Newfoundland</option>
				<option value="NT">Northwest Territories</option>
				<option value="NS">Nova Scotia</option>
				<option value="ONT">Ontario</option>
				<option value="PI">Prince Edward Island</option>
				<option value="PQ">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="YT">Yukon</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="other-country" class="col-sm-6 control-label">"Other" Country Name</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="other-country" name="other-country" placeholder="Leave blank if US or Canada">
		</div>
	</div>
	<div class="form-group">
		<label for="other-country-mail" class="col-xs-12 col-sm-6 control-label">"Other" Country Shipping:</label>	
		<div class="col-xs-6 col-sm-3 radio">
			<label><input checked type="radio" name="other-country-mail" id="air-mail"> Air Mail</label>
		</div>
		<div class="col-xs-6 col-sm-3 radio">
			<label><input type="radio" name="other-country-mail" id="surface-mail"> Surface Mail</label>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-6">
			<button type="submit" class=" btn btn-primary">Review Order</button>
		</div>
	</div>
</form>

<script src="/assets/js/purchase.js" type="text/javascript"></script>
<link href="/assets/css/purchase.css" rel="stylesheet">
