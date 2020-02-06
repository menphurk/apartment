<?php


class Repair extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// load base_url
		$this->load->helper(array('form', 'url'));

		$this->load->model('Repair_model');

		$this->load->library("pagination");
		$this->load->model('Room_model');
	}

	public function check_auth($page)
	{
		if (!$this->session->userdata('login_id')) {
			$this->session->set_flashdata('msgerr', '<p class="login-box-msg" style="color:red;">จำเป็นต้องเข้าสู่ระบบก่อนใช้งาน</p>');
			redirect('login');
		}
	}

	public function index()
	{
		//Paginate//
		$config = array();
		$config["base_url"] = base_url() . "dorm/index";
		$config["total_rows"] = $this->Repair_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = array();
		$data['title'] = "รายการแจ้งซ่อม";
		$data["repairs"] = $this->Repair_model->get_paginate_list($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->check_auth('index');
		$this->middle = 'repair/index';
		$this->data = $data;
		$this->layout();
	}

	public function create()
	{
		$data = array();
		$data['title'] = "เพิ่มแจ้งซ่อม";
		$data['rooms'] = $this->Room_model->get_list();

		$this->check_auth('create');
		$this->middle = 'repair/create';
		$this->data = $data;
		$this->layout();
	}

	public function save()
	{
		$this->form_validation->set_rules('topic', 'หัวข้อแจ้งซ่อม', 'required');
		$this->form_validation->set_rules('description', 'รายละเอียด', 'required');
		$this->form_validation->set_rules('room_id', 'ห้อง', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array();
			$data['title'] = "เพิ่มแจ้งซ่อม";
			$data['rooms'] = $this->Room_model->get_list();
			//print_r($data);
			$this->check_auth('create');
			$this->middle = 'repair/create';
			$this->data = $data;
			$this->layout();
		} else {
			$data = array(
				'topic' => $this->input->post('topic'),
				'description' => $this->input->post('description'),
				'room_id' => $this->input->post('room_id'),
				'member_id' => $this->input->post('member_id'),
				'repair_date' => date("Y-m-d H:i:s"),
				'timestamp_create' => date("Y-m-d H:i:s"),
				'timestamp_update' => date("Y-m-d H:i:s")
			);
			$this->Repair_model->insert($data);
			$this->session->set_flashdata(
				array(
					'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>'
				)
			);
			redirect(base_url('repair/index'));
		}
	}

	public function show()
	{
		$id = $this->uri->segment('3');

		$data = array();
		$data['title'] = "ข้อมูลแจ้งซ่อม";
		$data['repair'] = $this->Repair_model->get_one_list($id);
		$data['rooms'] = $this->Room_model->get_list();

		$this->check_auth('show');
		$this->middle = 'repair/index';
		$this->data = $data;
		$this->layout();
	}

	public function edit()
	{
		$id = $this->uri->segment('3');

		$data = array();
		$data['title'] = "แก้ไขหอพัก";
		$data['repair'] = $this->Repair_model->get_one_list($id);
		$data['rooms'] = $this->Room_model->get_list();

		$this->check_auth('edit');
		$this->middle = 'repair/edit';
		$this->data = $data;
		$this->layout();
	}

	public function update()
	{
		$data = array(
			'topic' => $this->input->post('topic'),
			'description' => $this->input->post('description'),
			'room_id' => $this->input->post('room_id'),
			'member_id' => $this->input->post('member_id'),
			'timestamp_update' => date("Y-m-d H:i:s")
		);

		$id = $this->input->post('id');

		$this->Repair_model->update($data, $id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);
		redirect('repair/index', 'refresh');
	}

	public function delete(){

		$id = $this->uri->segment('3');

		$this->Repair_model->delete($id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">ลบข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);
		redirect('repair/index');
	}
}
