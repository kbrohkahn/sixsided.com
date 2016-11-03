<?php
class Sheet_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_sheet($id = FALSE)
	{
		if ($id == FALSE)
		{
			return get_sheets();
		} else {
			$this->db
				->select('s.id, s.scale, s.name, e.name as "era", t.name as "type", t.year as "year", sc.scale as "scale"')
				->from('sheets s')
				->join('sheet_types st', 's.id = st.sheet_id')
				->join('types t', 'st.type_id = t.id')
				->join('eras e', 't.era = e.id')
				->join('scales sc', 's.scale = sc.id')
				->where('s.id', $id);
			return $this->db->get()->row_array();
		}

	}

	public function get_sheets($era = '', $type = '', $scale = '', $year = '')
	{
		$this->db
			->select('s.id, s.scale, s.name, e.name as "era", t.name as "type", t.year as "year", sc.scale as "scale"')
			->from('sheets s')
			->join('sheet_types st', 's.id = st.sheet_id')
			->join('types t', 'st.type_id = t.id')
			->join('eras e', 't.era = e.id')
			->join('scales sc', 's.scale = sc.id');

		if ($era !== '') {
			$this->db->where('e.name', $era);
		}

		if ($type !== '') {
			$this->db->where('t.name', $type);
		}

		if ($type !== '') {
			$this->db->where('s.scale', $scale);
		}

		if ($year !== '') {
			$this->db->where('t.year', $year);
		}

		$this->db->order_by('year asc, era asc, type asc');

		return $this->db->get()->result_array();
	}

	public function get_scales()
	{
		$this->db
			->select('scale')
			->from('scales')
			->order_by('scale asc');
		return $this->db->get()->result_array();		
	}

	public function get_eras()
	{
		$this->db
			->select('name as "era"')
			->from('eras')
			->order_by('name asc');
		return $this->db->get()->result_array();
	}

	public function get_years()
	{
		$this->db
			->select('year')
			->distinct()
			->from('types')
			->order_by('year asc');
		return $this->db->get()->result_array();
	}

	public function get_types($era = '')
	{
		$this->db
			->select('era.name as "era", type.name as "type"')
			->from('types type')
			->join('eras era', 'type.era = era.id')
			->order_by('era asc, type asc');

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

	public function recreate_database()
	{
		$csvFile = array_map('str_getcsv', file('assets/files/data.csv'));

		$this->db->empty_table('eras');
		$this->db->empty_table('types');
		$this->db->empty_table('sheets');
		$this->db->empty_table('sheet_types');

		foreach ($csvFile as $csvLine) {
			$row = $csvLine[0];
			$num = $csvLine[1];
			$book = $csvLine[2];
			$tab = $csvLine[3];
			$era = $csvLine[4];
			$type = $csvLine[5];
			$year = $csvLine[6];


			// get era id
			$query = $this->db
				->select('id')
				->from('eras')
				->where('name', $era)
				->get();
			$eraRow = $query->row();

			// era now found, insert
			if (isset($eraRow)) {
				$eraId = $eraRow->id;
			} else {
				// update, then get era id
				$values = array('name' => $era);
				$this->db->insert('eras', $values);
				
				$query = $this->db
					->select('id')
					->from('eras')
					->where('name', $era)
					->get();
				$eraId = $query->row()->id;
			}



			// now insert type
			$values = array('era' => $eraId, 'name' => $type, 'year' => $year);
			$this->db->insert('types', $values);

			// now get type id
			$query = $this->db
				->select('id')
				->from('types')
				->where($values)
				->get();
			$typeId = $query->row()->id;



			// now insert sheet
			$scale = 3;
			// $values = array('scale' => $scale, 'row' => $row, 'number' => $number, 'book' => $book, 'tab' => $tab);
			$values = array('scale' => $scale, 'row' => 0, 'number' => 0, 'book' => 0, 'tab' => 'A', 'name' => $era.$type);
			$this->db->insert('sheets', $values);

			// now get sheet id
			$query = $this->db
				->select('id')
				->from('sheets')
				->where($values)
				->get();
			$sheetId = $query->row()->id;



			// now insert sheet - type reference
			$values = array('sheet_id' => $sheetId, 'type_id' => $typeId);
			$this->db->insert('sheet_types', $values);

		}
	}
}