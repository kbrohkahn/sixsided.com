<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
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

		$data['videos'] = $this->video_model->get_videos();
		$data['title'] = 'Manage uploaded videos';

		$this->load->view('templates/header', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('templates/footer');
	}

	public function create_video()
	{
		$this->checkCookie();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a video item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('text', 'Summary', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('admin/create_video', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->video_model->set_video();
			header("Location: ".site_url("/admin"));
			exit();
		}
	}

	public function delete_video($slug = FALSE)
	{
		$this->checkCookie();

		$this->video_model->delete_video($slug);

		header("Location: ".site_url("/admin"));
		exit();
	}

	public function edit_video($slug = FALSE)
	{
		$this->checkCookie();

		$data['video_item'] = $this->video_model->get_videos($slug);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Edit video item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('admin/edit_video', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->video_model->update_video($slug);
			
			header("Location: ".site_url("/admin"));
			exit();
		}
	}
}
