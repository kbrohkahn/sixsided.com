<?php
class Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
	}

	public function index()
	{
		$data['videos'] = $this->video_model->get_videos();
		$data['title'] = 'Video archive';

		$this->load->view('templates/header', $data);
		$this->load->view('videos/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['video_item'] = $this->video_model->get_videos($slug);

		if (empty($data['video_item']))
		{
			show_404();
		}

		$data['title'] = $data['video_item']['title'];

		$this->load->view('templates/header');
		$this->load->view('videos/view', $data);
		$this->load->view('templates/footer');
	}
}
