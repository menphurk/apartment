<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Promise extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));
        $this->load->model('Title_model');
        $this->load->model('Promise_model');
        $this->load->model('Room_model');
        $this->load->model('Member_model');

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
        $config["base_url"] = base_url() . "promise/index";
        $config["total_rows"] = $this->Promise_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array();
        $data['title'] = "รายการสัญญาเช่า";
        $data["promises"] = $this->Promise_model->get_paginate_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->check_auth('index');
        $this->template->set('title', 'รายการสัญญาเช่า');
        $this->template->load('default', 'contents', 'promise/index', $data);
    }


    public function create()
    {
        $data = array();
        $data['title'] = "ทำสัญญาเช่า";
        $data['members'] = $this->Member_model->get_list();
        $data['rooms'] = $this->Room_model->get_list();

        $this->check_auth('create');
        $this->template->set('title', 'ทำสัญญาเช่า');
        $this->template->load('default', 'contents', 'promise/create', $data);
    }


    public function save()
    {
        $this->form_validation->set_rules('start_pro', 'วันที่เข้าอยู่', 'required');
        $this->form_validation->set_rules('end_pro', 'วันที่สิ้นสุด', 'required');
        $this->form_validation->set_rules('room_id', 'ห้อง', 'required');
        $this->form_validation->set_rules('recognizance', 'เงินประกัน', 'required');
		$this->form_validation->set_rules('member_id', 'ผู้เช่า', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "ทำสัญญาเช่า";
			$data['members'] = $this->Member_model->get_list();
            $data['rooms'] = $this->Room_model->get_list();
            //print_r($data);
            $this->check_auth('create');
            $this->template->set('title', 'ทำสัญญาเช่า');
            $this->template->load('default', 'contents', 'promise/create', $data);
        } else {
            $data = array(
                'start_pro' => $this->input->post('start_pro'),
                'end_pro' => $this->input->post('end_pro'),
                'room_id' => $this->input->post('room_id'),
                'recognizance' => $this->input->post('recognizance'),
                'member_id' => $this->input->post('member_id'),
                'timestamp_create' => date("Y-m-d H:i:s"),
                'timestamp_update' => date("Y-m-d H:i:s")
            );

            $this->Promise_model->insert($data);
            $this->session->set_flashdata(
                array(
                    'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>'
                )
            );
            redirect(base_url('promise/index'));
        }
    }

    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลสัญญาเช่า";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['promise'] = $this->Promise_model->get_one_list($id);

        $this->check_auth('show');
        $this->template->set('title', 'ข้อมูลสัญญาเช่า');
        $this->template->load('default', 'contents', 'promise/show', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "แก้ไขสัญญาเช่า";
        $data['prefixs'] = $this->Title_model->get_list();
		$data['members'] = $this->Member_model->get_list();
        $data['promise'] = $this->Promise_model->get_one_list($id);
        $data['rooms'] = $this->Room_model->get_list();

        $this->check_auth('edit');
        $this->template->set('title', 'แก้ไขสัญญาเช่า');
        $this->template->load('default', 'contents', 'promise/edit', $data);
    }

    public function update()
    {
        $data = array(
            'start_pro' => $this->input->post('start_pro'),
            'end_pro' => $this->input->post('end_pro'),
            'room_id' => $this->input->post('room_id'),
            'recognizance' => $this->input->post('recognizance'),
			'member_id' => $this->input->post('member_id'),
            'timestamp_update' => date("Y-m-d H:i:s")
        );

        $id = $this->input->post('id');

        $this->Promise_model->update($data, $id);
        $this->session->set_flashdata(
            array(
                'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
            )
        );
        redirect('promise/index', 'refresh');
    }

	public function delete(){

		$id = $this->uri->segment('3');

		$this->Promise_model->delete($id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">ลบข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);
		redirect('promise/index');
	}
}
