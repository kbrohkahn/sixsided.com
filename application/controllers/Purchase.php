<?php
class Purchase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sheet_model');
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
		$data['sheetItems'] = $this->sheet_model->get_sheets();
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

	public function shipping() {
		$data['title'] =  "Enter Shipping Info";

		$data = $this->loadItemList($data);

		$this->load->view('templates/header');
		$this->load->view('purchase/shipping', $data);
		$this->load->view('templates/footer');

	}

	public function review() {
		$data['title'] =  "Review Your Purchase";

		$data['country'] = $this->input->post('country');
		$data['state'] = $this->input->post('state');
		$data['other_country'] = $this->input->post('other-country');
		$data['other_country_mail'] = $this->input->post('other-country-mail');

		$data = $this->loadItemList($data);

		$data['individual_deck_total'] = 
				$data['individual_deck_1'] +
				$data['individual_deck_2'] +
				$data['individual_deck_3'] +
				$data['individual_deck_4'] +
				$data['individual_deck_5'];

		if ($data['individual_deck_total'] >= 10) {
			$data['individual_deck_price'] = 8;
		} else if ($data['individual_deck_total'] >= 5) {
			$data['individual_deck_price'] = 9;
		} else {
			$data['individual_deck_price'] = 10;
		}

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

		$this->load->view('templates/header');
		$this->load->view('purchase/review', $data);
		$this->load->view('templates/footer');
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



	public function purchase() {
		

	}
}
