<?php
class Sheets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sheet_model');
	}

	public function index()
	{
		$this->search();
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

	public function search($era = '', $type = '', $scale = '', $year = '')
	{
		if ($era == '' && $type == '' && $scale == '' && $year == '') {
			$data['title'] = 'Flag Sheet Archive';
		} else {
			$data['title'] = 'Flag Sheet Search Results';
		}

		# get all eras
		$eras = $this->sheet_model->get_eras();
		
		# lopp through all eras and get list of associated types
		$data['eraNameKeys'] = array();
		foreach ($eras as &$era) {
			$eraNameKey = $era['era'];
			$eraNameKey = str_replace(' ', '', $eraNameKey);
			$eraNameKey = str_replace(',', '', $eraNameKey);
			$eraNameKey = str_replace('.', '', $eraNameKey);
			$eraNameKey = str_replace('(', '', $eraNameKey);
			$eraNameKey = str_replace(')', '', $eraNameKey);
			$eraNameKey = str_replace('-', '', $eraNameKey);
			$eraNameKey = $eraNameKey."-types";

			$era['eraNameKey'] = $eraNameKey;
			$era['types'] = $this->sheet_model->get_types($era['era']);

			array_push($data['eraNameKeys'], $eraNameKey);
		}

		$data['eras'] = $eras;
		$data['years'] = $this->sheet_model->get_years();
		$data['scales'] = $this->sheet_model->get_scales();
		$data['sheets'] = $this->sheet_model->get_sheets();

		$this->load->view('templates/header');
		$this->load->view('sheets/index', $data);
		$this->load->view('templates/footer');
	}
}
