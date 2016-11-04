<?php
class Sheets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sheet_model');
	}

	public function index()
	{
		$this->display_results();
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

	public function search() {
		$year = $this->input->post('year');
		$era = $this->input->post('era');
		$type = $this->input->post('type');
		$scale = $this->input->post('scale');

		$this->display_results($era, $type, $scale, $year);

	}

	public function display_results($era = 'All', $type = 'All', $scale = 'All', $year = 'All')
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($era == 'All' && $type == 'All' && $scale == 'All' && $year == 'All') {
			$data['title'] = 'Flag Sheet Archive';
		} else {
			$data['title'] = 'Flag Sheet Search Results';
		}

		# get all eras
		$eras = $this->sheet_model->get_eras();

		
		# lopp through all eras and get list of associated types
		$data['eraNameKeys'] = array();
		foreach ($eras as &$eraItem) {
			$eraNameKey = $eraItem['era'];
			$eraNameKey = str_replace(' ', '', $eraNameKey);
			$eraNameKey = str_replace(',', '', $eraNameKey);
			$eraNameKey = str_replace('.', '', $eraNameKey);
			$eraNameKey = str_replace('(', '', $eraNameKey);
			$eraNameKey = str_replace(')', '', $eraNameKey);
			$eraNameKey = str_replace('-', '', $eraNameKey);
			$eraNameKey = $eraNameKey."-types";

			$eraItem['eraNameKey'] = $eraNameKey;
			$eraItem['types'] = $this->sheet_model->get_types($eraItem['era']);

			array_push($data['eraNameKeys'], $eraNameKey);
		}

		$data['eraValue'] = $era;
		$data['typeValue'] = $type;
		$data['scaleValue'] = $scale;
		$data['yearValue'] = $year;

		$data['eras'] = $eras;
		$data['years'] = $this->sheet_model->get_years();
		$data['scales'] = $this->sheet_model->get_scales();

		$data['sheets'] = $this->sheet_model->get_sheets($era, $type, $scale, $year);

		$this->load->view('templates/header');
		$this->load->view('sheets/index', $data);
		$this->load->view('templates/footer');
	}
}
