<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sheet_model');
	}

	public function checkCookie() {
		if(!isset($_COOKIE[ADMIN_COOKIE_NAME])) {
			header("Location: ".site_url("/admin/login"));
			exit();
		}
	}

	public function login() {
		$this->load->helper('form');

		if ($this->input->post('password') == ADMIN_PASSWORD)
		{
			setcookie(ADMIN_COOKIE_NAME, 'true', time() + (60 * 60 * 24 * 30), "/");

			header("Location: ".site_url("/admin"));
			exit();
		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('admin/login');
			$this->load->view('templates/footer');
		}
	}

	public function home()
	{
		$this->checkCookie();

		$data['sheets'] = $this->sheet_model->get_sheets();
		$data['title'] = 'Manage uploaded sheets';

		$this->load->view('templates/header', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/footer');
	}

	public function create_sheet()
	{
		$this->checkCookie();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a sheet item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('text', 'Summary', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('admin/create_sheet', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->sheet_model->add_sheet();
			header("Location: ".site_url("/admin"));
			exit();
		}
	}

	public function delete_sheet($slug = FALSE)
	{
		$this->checkCookie();

		$this->sheet_model->delete_sheet($slug);

		header("Location: ".site_url("/admin"));
		exit();
	}

	public function edit_sheet($slug = FALSE)
	{
		$this->checkCookie();

		$data['sheet_item'] = $this->sheet_model->get_sheets($slug);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Edit sheet item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('admin/edit_sheet', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->sheet_model->update_sheet($slug);
			
			header("Location: ".site_url("/admin"));
			exit();
		}
	}
}
