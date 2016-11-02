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
			->select('s.id, s.scale, s.name, e.name as "era", t.name as "type"')
			->from('sheets s')
			->join('sheet_types st', 's.id = st.sheet_id')
			->join('types t', 'st.type_id = t.id')
			->join('eras e', 't.era = e.id');

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