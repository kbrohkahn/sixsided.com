<?php
class Sheets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sheet_model');
	}

	public function index()
	{
		$data['sheets'] = $this->sheet_model->get_sheets();
		$data['title'] = 'Flag Sheet Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('sheets/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id = FALSE)
	{
		if ($id === FALSE) {
			return $this->search();
		} else {
			$data['sheet_item'] = $this->sheet_model->get_sheet($id);

			if (empty($data['sheet_item']))
			{
				show_404();
			}

			if ($id === FALSE) {
				$data['title'] = 'All sheets';
			}
			else {
				$data['title'] = 'Sheets where '.$data;
			}

			$this->load->view('templates/header');
			$this->load->view('sheets/view', $data);
			$this->load->view('templates/footer');
		}
	}

	public function search($era = '', $type = '', $scale = '')
	{
		# get all eras
		$eras = $this->sheet_model->get_eras();
		
		# lopp through all eras and get list of associated types
		foreach ($eras as $era) {
			$eraNameKey = str_replace($era['name'], ' ', '-')."-types";
			$eras['eraNameKey'] = $eraNameKey;
					
			$data[$eraNameKey] = $this->sheet_model->get_types($era['name']);
		}

		$data['eras'] = $eras;
		$data['eraNameKeys'] = $eraNameKeys;
		$data['scales'] = $this->sheet_model->get_scales();

		$this->load->view('templates/header');
		$this->load->view('sheets/search', $data);
		$this->load->view('templates/footer');
	}
}
