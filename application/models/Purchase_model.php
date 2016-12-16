<?php
class Purchase_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}



	/* GET DATA */

	
	public function get_sheets($era = 'All', $type = 'All', $scale = 'All', $century = 'All')
	{
		$this->db
			->select('s.id, s.scale, s.name, e.name as "era", t.name as "type", t.year as "year", sc.scale as "scale"')
			->from('sheets s')
			->join('sheet_types st', 's.id = st.sheet_id')
			->join('types t', 'st.type_id = t.id')
			->join('eras e', 't.era = e.id')
			->join('scales sc', 's.scale = sc.id');

		if ($era !== 'All') {
			$this->db->where('e.name', $era);
		}

		if ($type !== 'All') {
			$this->db->where('t.name', $type);
		}

		if ($scale !== 'All') {
			$this->db->where('s.scale', $scale);
		}

		if ($century !== 'All') {
			$this->db->where('t.year <', $century * 100);
			if ($century != CENTURY_MINIMUM) {
				$this->db->where('t.year >', ($century - 1) * 100 );
			}
		}

		$this->db->order_by('year asc, era asc, type asc');

		return $this->db->get()->result_array();
	}

	public function save_address($firstName, $lastName, $address, $addressLine2, $city, $state, $zip, $country, $email) {
		// check if address already exists
		$this->db->select('id')
				->from('addresses')
				->where('email', $email);
		$existingItemArray = $this->db->get()->result_array();

		if (count($existingItemArray) > 0) {
			// address already exists, just return the id
			return $existingItemArray[0]["id"];
		}
		else 
		{
			// save address
			$values = array('email' => $email, 'first_name' => $firstName, 'last_name' => $lastName, "address" => $address, "address_line_2" => $addressLine2, "city" => $city, "state" => $state, "zip" => $zip, "country" => $country);
			$this->db->insert('addresses', $values);

			$this->db->select('id')
					->from('addresses')
					->where('email', $email);

			$newItem = $this->db->get()->result_array()[0];
			
			if (is_null($newItem)) {
				return -1;
			} else {
				return $newItem["id"];
			}
		}
	}

	public function save_transaction($braintreeNonce, $total, $email, $address_id, $items) {
		// create confirmation code
		$confirmationCode = $this->get_confirmation_code();

		$values = array('braintree_nonce' => $braintreeNonce, 'total' => $total, 'email' => $email, 'confirmation_code' => $confirmationCode, "transaction_date" => time(), "address_id" => $address_id, 'success' => 0);
		$this->db->insert('transactions', $values);

		// get id for transaction we just inserted
		$this->db->select('id')
				->from('transactions')
				->where('confirmation_code', $confirmationCode);
		$transactionId = $this->db->get()->result_array()[0]["id"];

		// save items with new transaction id
		foreach ($items as $item) {
			$itemValues = array('transaction_id' => $transactionId, 'item_name' => $item["name"], 'count' => $item["count"], 'price' => $item["price"]);
			$this->db->insert('transaction_items', $itemValues);
		}

		return $confirmationCode;
	}

	public function set_transaction_success($braintreeNonce, $confirmationCode) {
		$this->db->set('success', 1)
				->where('braintree_nonce', $braintreeNonce)
				->where('confirmation_code', $confirmationCode)
				->update('transactions');
	}

	public function get_confirmation_code()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}
		else
		{
			return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
		}
	}
}