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

	public function view($slug = NULL)
	{
		$data['sheet_item'] = $this->sheet_model->get_sheets($slug);

		if (empty($data['sheet_item']))
		{
			show_404();
		}

		$data['title'] = $data['sheet_item']['title'];

		$this->load->view('templates/header');
		$this->load->view('sheets/view', $data);
		$this->load->view('templates/footer');
	}
}
