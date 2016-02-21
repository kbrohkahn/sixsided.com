<?php
class Sheet_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_sheets($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('sheets');
			return $query->result_array();
		}

		$query = $this->db->get_where('sheets', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_sheet()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'link' => $this->input->post('link'),
			'text' => $this->input->post('text')
		);

		return $this->db->insert('sheets', $data);
	}

	public function delete_sheet($slug = FALSE)
	{
		if ($slug !== FALSE) {
			$this->db->delete('sheets', array('slug' => $slug));
		}
	}

	public function update_sheet($slug = FALSE)
	{
		$new_slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $new_slug,
			'link' => $this->input->post('link'),
			'text' => $this->input->post('text')
		);

		return $this->db->update('sheets', $data, array('slug' => $slug));
	}
}