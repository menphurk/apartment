<?php


class Bill_model extends CI_Model
{
	protected $tablePromise = 'promise_renter';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><ul><li>', '</li></ul></div>');
	}



	///User//
	public function getInvoiceMember($id)
	{
		$this->db->select("title.name as titlename, promise_renter.*, 
		rooms.name as roomname, 
		rooms.price as price, 
		rooms.code_place_room as placeroom, 
		rooms.code_floor_room as codefloor, 
		CONCAT(members.first_name, \" \", members.last_name, \" \") AS fullname, 
		meters_rec.w_meter_now as water_meter, 
		meters_rec.e_meter_now as e_meter,
		meters_rec.date_rec as date_rec,
		meters_rec.status as status,
		");
		$this->db->join('rooms', 'rooms.id = promise_renter.room_id');
		$this->db->join('members', 'members.id = rooms.user_id', 'left');
		$this->db->join('title', 'title.id = members.title_id', 'left');
		$this->db->join('meters_rec', 'meters_rec.room_id = rooms.id');
		$query = $this->db->get_where($this->tablePromise, array("promise_renter.member_id" => $id));
		$data = $query->result();

		return $data;
	}
}
