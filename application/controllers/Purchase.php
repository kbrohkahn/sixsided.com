<?php
class Purchase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Purchase_model');
	}

	public function view($page = 'items')
	{
		if (!file_exists(APPPATH.'/purchase/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] =  "Purchase - " . ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header');
		$this->load->view('purchase/'.$page, $data);
		$this->load->view('templates/footer');
		
	}

	public function items() {
		$data['sheetItems'] = $this->Purchase_model->get_sheets();
		$data['title'] =  "Select Items";


		$this->load->view('templates/header');
		$this->load->view('purchase/items', $data);
		$this->load->view('templates/footer');
	}

	public function loadItemList($data) {
		$data['individual_deck_1'] = $this->input->post('individual-deck-1');
		$data['individual_deck_2'] = $this->input->post('individual-deck-2');
		$data['individual_deck_3'] = $this->input->post('individual-deck-3');
		$data['individual_deck_4'] = $this->input->post('individual-deck-4');
		$data['individual_deck_5'] = $this->input->post('individual-deck-5');

		$data['complete_deck_1'] = $this->input->post('complete-deck-1');
		$data['complete_deck_2'] = $this->input->post('complete-deck-2');
		$data['complete_deck_3'] = $this->input->post('complete-deck-3');
		$data['complete_deck_4'] = $this->input->post('complete-deck-4');
		$data['complete_deck_5'] = $this->input->post('complete-deck-5');

		$data['flag_sheets'] = array();
		for ($i = 0; $i < 100; $i++) {
			$sheetToPurchase = $this->input->post('sheet-item-' . $i);

			if ($sheetToPurchase !== null && $sheetToPurchase !== "") {
				array_push($data['flag_sheets'], $sheetToPurchase);
			}
		}
		return $data;
	}

	public function loadShippingFields($data) {
		$data['firstName'] = $this->input->post('first-name');
		$data['lastName'] = $this->input->post('last-name');
		$data['address'] = $this->input->post('address');
		$data['addressLine2'] = $this->input->post('address-line-2');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['zip'] = $this->input->post('zip');
		$data['country'] = $this->input->post('country');
		$data['email'] = $this->input->post('email');
	
		return $data;
	}

	public function loadTotals($data) {
		$data['individual_deck_total'] = 
				$data['individual_deck_1'] +
				$data['individual_deck_2'] +
				$data['individual_deck_3'] +
				$data['individual_deck_4'] +
				$data['individual_deck_5'];

		$data['individual_deck_price'] = $this->getIndividualDeckCost($data['individual_deck_total']);

		$data['complete_deck_total'] = 
				$data['complete_deck_1'] +
				$data['complete_deck_2'] +
				$data['complete_deck_3'] +
				$data['complete_deck_4'] +
				$data['complete_deck_5'];

		$data['flag_sheet_total'] = count($data['flag_sheets']);

		$data['subtotal'] = 
				$data['complete_deck_total'] * 40 + 
				$data['individual_deck_total'] * $data['individual_deck_price'] +
				$data['flag_sheet_total'] * 10;

		// calculate tax (only in Maryland)
		$data['tax'] = $this->calculateTax();
		
		// calculate shipping cost
		$data['shipping'] = $this->calculateShipping($data['individual_deck_total'], $data['complete_deck_total'], $data['flag_sheet_total'], $data['country']);
		
		// calculate total
		$data['total'] = $data['subtotal'] + $data['shipping'] + $data['tax'];

		return $data;
	}

	public function shipping($errorMessage = "") {
		$data['title'] =  "Enter Shipping Info";
		$data['errorMessage'] = $errorMessage;

		$data = $this->loadItemList($data);

		$this->load->view('templates/header');
		$this->load->view('purchase/shipping', $data);
		$this->load->view('templates/footer');
	}

	public function review($errorMessage = "") {
		$data['title'] = "Review Your Purchase";
		
		// load shipping fields then validate
		$data = $this->loadShippingFields($data);
		$shippingValidationMessage = $this->validateShippingFields($data["firstName"], $data["firstName"], $data["lastName"], $data["address"], $data["addressLine2"], $data["city"], $data["state"], $data["zip"], $data["country"], $data["email"]);

		if (strlen($shippingValidationMessage) > 0) {
			$this->shipping($shippingValidationMessage);
		} else {
			$data['errorMessage'] = $errorMessage;
			
			$data = $this->loadItemList($data);
			$data = $this->loadTotals($data);

			$this->load->view('templates/header');
			$this->load->view('purchase/review', $data);

			$this->load->view('purchase/complete', $data);
			$this->load->view('templates/footer');
		}

	}

	public function getIndividualDeckCost($individualDeckCount = 0) {
		if ($individualDeckCount >= 10) {
			return INDIVIDUAL_DECK_COST - 2;
		} else if ($individualDeckCount >= 5) {
			return INDIVIDUAL_DECK_COST - 1;
		} else {
			return INDIVIDUAL_DECK_COST;
		}	
	}

	public function calculateTax($subTotal = 0, $state = "")
	{
		return ($state == 'MD' ? .05 * $subTotal : 0);
	}

	public function calculateShipping($vexIndividual = 0, $vexComplete = 0, $flagSheets = 0, $country = 'United States')
	{
		if ($country == 'United States') {
			return $vexIndividual * 1 + $vexComplete * 4;
		} else if ($country == 'Canada') {
			return $vexIndividual * 2 + $vexComplete * 8;
		} else {
			return $vexIndividual * 5 + $vexComplete * 20 + $flagSheets * 3;
		}
	}


	public function complete() {
		$data["title"] = "Purchase complete";

		// load shipping fields then validate
		$data = $this->loadShippingFields($data);
		$shippingValidationMessage = $this->validateShippingFields($data["firstName"], $data["firstName"], $data["lastName"], $data["address"], $data["addressLine2"], $data["city"], $data["state"], $data["zip"], $data["country"], $data["email"]);

		if (strlen($shippingValidationMessage) > 0) 
		{
			$this->review($shippingValidationMessage);
		} 
		else {
			$data = $this->loadShippingFields($data);
			$data = $this->loadItemList($data);
			$data = $this->loadTotals($data);

			$email = $data["email"];

			// first save address, we need ID to save transaction
			$addressId = $this->Purchase_model->save_address($data["firstName"], $data["lastName"], $data["address"], $data["addressLine2"], $data["city"], $data["state"], $data["zip"], $data["country"], $email);

			if ($addressId <= 0) {
				throw new Exception("Failed to save address");
			} else {
				// address saved and we have addressId, so now save transaction
				$nonceFromTheClient = $this->input->post('payment_method_nonce');



				// get list of items purchased
				$itemsList = array();

				for ($i=1; $i<=5; $i++) {
					$completeDeckCountI = $data['complete_deck_' . $i];
					if ($completeDeckCountI > 0) {
						$item['name'] = 'complete_deck_' . $i;
						$item['count'] = $completeDeckCountI;
						$item['price'] = COMPLETE_DECK_COST;
						array_push($itemsList, $item);
					}
				}

				for ($i=1; $i<=5; $i++) {
					$individualDeckCountI = $data['individual_deck_' . $i];
					if ($individualDeckCountI > 0) {
						$item['name'] = 'individual_deck_' . $i;
						$item['count'] = $individualDeckCountI;
						$item['price'] = $data['individual_deck_price'];
						array_push($itemsList, $item);
					}
				}

				foreach ($data['flag_sheets'] as $flagSheet) {
					$item['name'] = $flagSheet;
					$item['price'] = INDIVIDUAL_SHEET_COST;
					$item['count'] = 1;
						array_push($itemsList, $item);
				}

			

				// save transaction (with items)
				$confirmationCode = $this->Purchase_model->save_transaction($nonceFromTheClient, $data["total"], $email, $addressId, $itemsList);



				$data["confirmation_code"] = $confirmationCode;
				$data['errorMessage'] = "";

				// all data saved, now perform the transaction
				require_once APPPATH.'/libraries/braintree-php-3.18.0/lib/Braintree.php';
			
				Braintree_Configuration::environment(BRAINTREE_ENVIRONMENT);
				Braintree_Configuration::merchantId(BRAINTREE_MERCHANT_ID);
				Braintree_Configuration::publicKey(BRAINTREE_PUBLIC_KEY);
				Braintree_Configuration::privateKey(BRAINTREE_PRIVATE_KEY);

				$result = Braintree_Transaction::sale([
					'amount' => $data["total"],
					'paymentMethodNonce' => $nonceFromTheClient,
					'options' => [
						'submitForSettlement' => True
					]
				]);

				if ($result->success) {
					$this->Purchase_model->set_transaction_success($nonceFromTheClient, $confirmationCode);

					$recipient = $email;
					$subject = "Six Sided - Thank you for your purchase!";
					
					$innerMessage = "Thank you for your purchase, your confirmation code is " . $confirmationCode;
					$message = $this->getIncludeContents(APPPATH . 'views/purchase/review.php', $innerMessage, $data);

					require APPPATH.'/libraries/phpmailer/phpmailer/PHPMailerAutoload.php';
					
					$this->sendEmail($recipient, $subject, $message, true, false, false); 

					$this->load->view('templates/header');
					$this->load->view('purchase/summary', $data);
					$this->load->view('purchase/review', $data);
					$this->load->view('templates/footer');
				} else {
					// check for validation errors
					$errorMessage = "";
					foreach($result->errors->deepAll() as $error) {
 						$errorMessage .= ($error->code . ": " . $error->message . "\n");
					}

					// no validation errors, find transaction error
					if ($errorMessage == "") {
						switch ($result->transaction->status) {
							case "processor_declined":
								$errorMessage = $result->transaction->processorResponseText . "\n" . $result->transaction->additionalProcessorResponse;
								break;
							case "settlement_declined":
								$errorMessage = $result->transaction->processorSettlementResponseText;
								break;
							case "gateway_rejected":
								$errorMessage = "Account " . $result->transaction->gatewayRejectionReason . " is invalid.";
								break;
						}
					}


					$data["error_message"] = $errorMessage;

					$this->review();
				}
			}
		}
	}

	public function validateShippingFields($firstName, $lastName, $address, $addressLine2, $city, $state, $zip, $country, $email) {
		if (strlen($firstName) >= 64) {
			return "First name must be less than 64 characters";
		} else if (strlen($lastName) >= 64) {
			return "Last name must be less than 64 characters";
		} else if (strlen($address) >= 256) {
			return "Address must be less than 256 characters";
		} else if (strlen($addressLine2) >= 256) {
			return "Address (line 2) must be less than 256 characters";
		} else if (strlen($city) >= 64) {
			return "City must be less than 64 characters";
		} else if (strlen($state) >= 64) {
			return "State must be less than 64 characters";
		} else if (strlen($zip) >= 16) {
			return "Zip must be less than 16 characters";
		} else if (strlen($country) >= 64) {
			return "Country name must be less than 64 characters";
		} else if (strlen($email) >= 256) {
			return "Email must be less than 256 characters";
		} else {
			return "";
		}
	}

	public function sendEmail($recipient, $subject, $message, $bccDev, $bccOwner, $useBackupAccount) {
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';

		$mail->Host = $useBackupAccount ? BACKUP_SMTP_SERVER : SMTP_SERVER;
		$mail->Username = $useBackupAccount ? BACKUP_SMTP_EMAIL : SMTP_EMAIL;
		$mail->Password = $useBackupAccount ? BACKUP_SMTP_PASSWORD : SMTP_PASSWORD;
		$mail->Port = $useBackupAccount ? BACKUP_SMTP_PORT : SMTP_PORT;

		$mail->setFrom(SMTP_REPLY_TO, COMPANY_NAME);
		$mail->addAddress($recipient);
		//$mail->addAddress($recipient, "Joe Schmoe");
		$mail->addReplyTo(SMTP_REPLY_TO, COMPANY_NAME);
		
		if ($bccDev) {
			$mail->addBCC(DEV_EMAIL);
		}
		if ($bccOwner) {
			$mail->addBCC(EMAIL);
		}

		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		
		$mail->Subject = $subject;
		$mail->Body = $message;

		$mail->isHTML(true);
		// $mail->AltBody = $message;

		if(!$mail->send()) {
			if (!$useBackupAccount) {
				$this->sendEmail($recipient, $subject, $message, $bccDev, $bccOwner, true);
			} else {
				echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;	
			}
		}
	}
	
	public function getIncludeContents($filename, $innerMessage, $variablesToMakeLocal) {
		extract($variablesToMakeLocal);

		ob_start();
		include APPPATH . 'views/templates/print_header.php';
		echo $innerMessage;
		include $filename;
		include APPPATH . 'views/templates/print_footer.php';
		return ob_get_clean();
	}
}
