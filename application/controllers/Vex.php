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
}
