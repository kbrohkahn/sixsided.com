<?php
class Vex extends CI_Controller {

	public function view($page = 'home')
	{
		if (!file_exists(APPPATH.'/views/vex/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] =  ucfirst($page)." VEX"; // Capitalize the first letter

		$this->load->view('templates/header');
		$this->load->view('vex/'.$page, $data);
		$this->load->view('templates/footer');
		
	}

	public function review() {
		$data['title'] =  "Review Your Purchase";

		$data['country'] = $this->input->post('country');
		$data['state'] = $this->input->post('state');
		$data['other_country'] = $this->input->post('other-country');
		$data['other_country_mail'] = $this->input->post('other-country-mail');
	

		$data['individual_deck_1'] = $this->input->post('individual-deck-1');
		$data['individual_deck_2'] = $this->input->post('individual-deck-2');
		$data['individual_deck_3'] = $this->input->post('individual-deck-3');
		$data['individual_deck_4'] = $this->input->post('individual-deck-4');
		$data['individual_deck_5'] = $this->input->post('individual-deck-5');

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

		$data['complete_deck_1'] = $this->input->post('complete-deck-1');
		$data['complete_deck_2'] = $this->input->post('complete-deck-2');
		$data['complete_deck_3'] = $this->input->post('complete-deck-3');
		$data['complete_deck_4'] = $this->input->post('complete-deck-4');
		$data['complete_deck_5'] = $this->input->post('complete-deck-5');

		$data['complete_deck_total'] = 
			$data['complete_deck_1'] +
			$data['complete_deck_2'] +
			$data['complete_deck_3'] +
			$data['complete_deck_4'] +
			$data['complete_deck_5'];


		$data['tax'] = 0.00 * ($data['complete_deck_total'] * 40 + $data['individual_deck_total'] * $data['individual_deck_price']);
		$data['shipping'] = 20;

		$this->load->view('templates/header');
		$this->load->view('vex/review', $data);
		$this->load->view('templates/footer');

	}
}
