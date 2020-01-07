<?php


class Meter_model extends CI_Model
{
	protected $table = 'meters_rec';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><ul><li>', '</li></ul></div>');
	}

	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function get_paginate_list($limit, $start)
	{
		$this->db->select("meters_rec.*, rooms.name as roomname");
		$this->db->from($this->table);
		$this->db->join('rooms', 'rooms.id = meters_rec.room_id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function get_one_list($id)
	{
		$this->db->select("rooms.name as roomname, meters_rec.*");
		$this->db->join('rooms', 'rooms.id = meters_rec.room_id');
		$query = $this->db->get_where($this->table, array("meters_rec.id" => $id));
		$data = $query->result();

		return $data;
	}

	public function insert($data)
	{
		if ($this->db->insert($this->table, $data)) {
			return true;
		}
	}

	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where("id", $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		if ($this->db->delete($this->table, "id = " . $id)) {
			return true;
		}
	}
}
