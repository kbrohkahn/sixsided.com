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

	public function save_transaction($braintreeNonce, $email) {
		$confirmationCode = com_create_guid();
		$transactionDate = time();

		$values = array('braintree_nonce' => $braintreeNonce, 'email' => $email, 'confirmation_code' => $confirmationCode, "transaction_date" => $transactionDate);
		$this->db->insert('transactions', $values);

		return $confirmationCode;
	}
}