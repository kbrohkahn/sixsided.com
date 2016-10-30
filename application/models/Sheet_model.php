<?php
class Sheet_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_sheet($id = FALSE)
	{
		if ($id === FALSE)
		{
			return get_sheets();
		} else {
			$this->db
				->select('sheet.id, sheet.scale, sheet.name, type.name as "type", era.name as "era"')
				->from('sheets sheet')
				->join('types type', 'sheet.type = type.id')
				->join('eras era', 'type.era = era.id')
				->where('sheet.id', $id);
			return $this->db->get()->row_array();
		}

	}

	public function get_sheets($era = '', $type = '', $scale = '')
	{
		$this->db
			->select('sheet.id, sheet.scale, sheet.name, era.name as "era", type.name as "type"')
			->from('sheets sheet')
			->join('types type', 'sheet.type = type.id')
			->join('eras era', 'type.era = era.id');

		if ($era !== '') {
			$this->db->where('era.name', $era);
		}

		if ($type !== '') {
			$this->db->where('type.name', $type);
		}

		if ($type !== '') {
			$this->db->where('sheet.scale', $scale);
		}

		return $this->db->get()->result_array();
	}

	public function get_scales()
	{
		$this->db
			->select('scale')
			->from('scales');
		return $this->db->get()->result_array();		
	}

	public function get_eras()
	{
		$this->db
			->select('name as "era"')
			->from('eras');
		return $this->db->get()->result_array();
	}

	public function get_types($era = '')
	{
		$this->db
			->select('era.name as "era", type.name as "type"')
			->from('types type')
			->join('eras era', 'type.era = era.id');

		if ($era !== '') {
			$this->db->where('era.name', $era);
		}

		return $this->db->get()->result_array();		
	}



	/* ADMIN FUNCTIONS */

	public function add_sheet()
	{
		$id = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'id' => $id,
			'link' => $this->input->post('link'),
			'text' => $this->input->post('text')
		);

		return $this->db->insert('sheets', $data);
	}

	public function delete_sheet($id = FALSE)
	{
		if ($id !== FALSE) {
			$this->db->delete('sheets', array('id' => $id));
		}
	}

	public function update_sheet($id = FALSE)
	{
		$new_id = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'id' => $new_id,
			'link' => $this->input->post('link'),
			'text' => $this->input->post('text')
		);

		return $this->db->update('sheets', $data, array('id' => $id));
	}
}