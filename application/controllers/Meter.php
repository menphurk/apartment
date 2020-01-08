<?php


class Meter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// load base_url
		$this->load->helper(array('form', 'url'));
		$this->load->model('Meter_model');
		$this->load->model('Room_model');

		$this->load->library("pagination");
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
		$config["base_url"] = base_url() . "meter/index";
		$config["total_rows"] = $this->Meter_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = array();
		$data['title'] = "มิเตอร์ไฟและน้ำ";
		$data["meters"] = $this->Meter_model->get_paginate_list($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->check_auth('index');
		$this->template->set('title', 'มิเตอร์ไฟและน้ำ');
		$this->template->load('default', 'contents', 'meter/index', $data);
	}


	public function create()
	{
		$data = array();
		$data['title'] = "ทำสัญญาเช่า";
		$data['rooms'] = $this->Room_model->get_list();

		$this->check_auth('create');
		$this->template->set('title', 'มิเตอร์ไฟและน้ำ');
		$this->template->load('default', 'contents', 'meter/create', $data);
	}


	public function save()
	{
		$this->form_validation->set_rules('start_pro', 'วันที่เข้าอยู่', 'required');
		$this->form_validation->set_rules('end_pro', 'วันที่สิ้นสุด', 'required');
		$this->form_validation->set_rules('room_id', 'ห้อง', 'required');
		$this->form_validation->set_rules('recognizance', 'เงินประกัน', 'required');
		$this->form_validation->set_rules('title_id', 'คำนำหน้าชื่อ', 'required');
		$this->form_validation->set_rules('first_name', 'ชื่อ', 'required');
		$this->form_validation->set_rules('last_name', 'นามสกุล', 'required');
		$this->form_validation->set_rules('phone', 'หมายเลขโทรศัพท์มือถือ', 'required');
		$this->form_validation->set_rules('address', 'ที่อยู่ที่ติดต่อสะดวก', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array();
			$data['title'] = "มิเตอร์ไฟและน้ำ";
			$data['prefixs'] = $this->Title_model->get_list();
			$data['rooms'] = $this->Room_model->get_list();
			//print_r($data);
			$this->check_auth('create');
			$this->template->set('title', 'มิเตอร์ไฟและน้ำ');
			$this->template->load('default', 'contents', 'meter/create', $data);
		} else {
			$data = array(
				'date_rec' => $this->input->post('date_rec'),
				'room_id' => $this->input->post('room_id'),
				'w_meter_now' => $this->input->post('w_meter_now'),
				'e_meter_now' => $this->input->post('e_meter_now')
			);

			$this->Meter_model->insert($data);
			$this->session->set_flashdata(
				array(
					'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>'
				)
			);
			redirect(base_url('meter/index'));
		}
	}

	public function show()
	{
		$id = $this->uri->segment('3');

		$data = array();
		$data['title'] = "ข้อมูลมิเตอร์ไฟและน้ำ";
		$data['meter'] = $this->Meter_model->get_one_list($id);

		$this->check_auth('show');
		$this->template->set('title', 'ข้อมูลมิเตอร์ไฟและน้ำ');
		$this->template->load('default', 'contents', 'meter/show', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment('3');

		$data = array();
		$data['title'] = "แก้ไขข้อมูลมิเตอร์ไฟและน้ำ";
		$data['meter'] = $this->Meter_model->get_one_list($id);

		$this->check_auth('edit');
		$this->template->set('title', 'แก้ไขข้อมูลมิเตอร์ไฟและน้ำ');
		$this->template->load('default', 'contents', 'meter/edit', $data);
	}

	public function update()
	{
		$data = array(
			'start_pro' => $this->input->post('start_pro'),
			'end_pro' => $this->input->post('end_pro'),
			'room_id' => $this->input->post('room_id'),
			'recognizance' => $this->input->post('recognizance'),
			'title_id' => $this->input->post('title_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'name_emergency' => $this->input->post('name_emergency'),
			'phone_emergency' => $this->input->post('phone_emergency'),
			'relationship_emergency' => $this->input->post('relationship_emergency'),
			'timestamp_update' => date("Y-m-d H:i:s")
		);

		$id = $this->input->post('id');

		$this->Promise_model->update($data, $id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);
		redirect('meter/index', 'refresh');
	}
}
