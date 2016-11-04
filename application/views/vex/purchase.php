<h1>Under construction</h1>
<p>Please <a href="mailto:<?= EMAIL ?>">email me</a> with any requests, online purchasing will be available soon!</p>
<!-- <h1><?php echo $title; ?></h1>

<form class="form" action="/vex/review" method="post" accept-charset="utf-8">
	<h4>Individual decks</h4>

	<em>Pricing</em>
	<ul>
		<li>1 to 4 total decks: 10$ each</li>
		<li>5 to 9 total decks: 9$ each</li>
		<li>10 or more total decks: 8$ each</li>
	</ul>

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

	<h4>Shipping Address</h4>

	<div class='row'>
		<div class='col-xs-6'>
			<div class='form-group'>
				<label for="first-name">First Name</label>
				<input type="text" class="form-control" name='first-name' id="first-name" required>
			</div>
		</div>
		<div class='col-xs-6'>
			<div class='form-group'>
				<label for="last-name">Last Name</label>
				<input type="text" class="form-control" name='last-name' id="last-name" required>
			</div>
		</div>
		<div class='col-xs-12'>
			<div class='form-group'>
				<label for="address">Address</label>
				<input type="text" class="form-control" name='address' id="address" required>
			</div>
		</div>
		<div class='col-xs-12'>
			<div class='form-group'>
				<label for="address2">Address line 2</label>
				<input type="text" class="form-control" name='address2' id="address2">
			</div>
		</div>

		<div class='col-xs-7'>
			<div class='form-group'>
				<label for="city">City</label>
				<input type="text" class="form-control" name='city' id="city" required>
			</div>
		</div>
		<div class='col-xs-5'>
			<div class='form-group'>
				<label for="state">State</label>
				<select class="form-control" id="state" name="state">
					<option value="none">None</option>
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
		<div class='col-xs-4'>
			<div class='form-group'>
				<label for="zip">ZIP</label>
				<input type="number" class="form-control" name='zip' id="zip" required>
			</div>
		</div>
		<div class='col-xs-8'>
			<div class='form-group'>
				<label for="country">Country</label>
				<select class="form-control" name="country" id="country" required>
					<option value="United States">United States</option>
					<option value="Afganistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bonaire">Bonaire</option>
					<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Canary Islands">Canary Islands</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Channel Islands">Channel Islands</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos Island">Cocos Island</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote DIvoire">Cote D'Ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Curaco">Curacao</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="East Timor">East Timor</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands">Falkland Islands</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Ter">French Southern Ter</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Great Britain">Great Britain</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran">Iran</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea North">Korea North</option>
					<option value="Korea Sout">Korea South</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libya">Libya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Midway Islands">Midway Islands</option>
					<option value="Moldova">Moldova</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Nambia">Nambia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherland Antilles">Netherland Antilles</option>
					<option value="Netherlands">Netherlands (Holland, Europe)</option>
					<option value="Nevis">Nevis</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau Island">Palau Island</option>
					<option value="Palestine">Palestine</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Phillipines">Philippines</option>
					<option value="Pitcairn Island">Pitcairn Island</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Republic of Montenegro">Republic of Montenegro</option>
					<option value="Republic of Serbia">Republic of Serbia</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="St Barthelemy">St Barthelemy</option>
					<option value="St Eustatius">St Eustatius</option>
					<option value="St Helena">St Helena</option>
					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
					<option value="St Lucia">St Lucia</option>
					<option value="St Maarten">St Maarten</option>
					<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
					<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
					<option value="Saipan">Saipan</option>
					<option value="Samoa">Samoa</option>
					<option value="Samoa American">Samoa American</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia">Serbia</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syria">Syria</option>
					<option value="Tahiti">Tahiti</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Erimates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="Uraguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vatican City State">Vatican City State</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
					<option value="Wake Island">Wake Island</option>
					<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
					<option value="Yemen">Yemen</option>
					<option value="Zaire">Zaire</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class=" btn btn-primary">Review Order</button>
	</div>
</form>

<!-- <script src="/assets/js/purchase.js" type="text/javascript"></script>
<!-- <link href="/assets/css/purchase.css" rel="stylesheet"> -->