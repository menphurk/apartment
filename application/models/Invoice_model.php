<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
	protected $table = 'invoice';

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
		$this->db->select("title.name as titlename, invoice.*, rooms.name as roomname, CONCAT(members.first_name, \" \", members.last_name, \" \") AS fullname");
		$this->db->from($this->table);
		$this->db->join('rooms', 'rooms.id = invoice.room_id');
		$this->db->join('members', 'members.id = rooms.user_id', 'left');
		$this->db->join('title', 'title.id = members.title_id', 'left');
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
		$this->db->select("title.name as titlename, invoice.*, rooms.name as roomname, rooms.price as price, rooms.code_place_room as placeroom, rooms.code_floor_room as codefloor, CONCAT(members.first_name, \" \", members.last_name, \" \") AS fullname, meters_rec.w_meter_now as water_meter, meters_rec.e_meter_now as e_meter");
		$this->db->join('rooms', 'rooms.id = invoice.room_id');
		$this->db->join('members', 'members.id = rooms.user_id', 'left');
		$this->db->join('title', 'title.id = members.title_id', 'left');
		$this->db->join('meters_rec', 'meters_rec.room_id = rooms.id');
		$query = $this->db->get_where($this->table, array("invoice.id" => $id));
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
