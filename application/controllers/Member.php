<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));

        $this->load->model('Member_model');
        $this->load->model('Title_model');

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
        $config["base_url"] = base_url() . "member/index";
        $config["total_rows"] = $this->Member_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array();
        $data['title'] = "รายการผู้เช่า";
        $data["members"] = $this->Member_model->get_paginate_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->check_auth('index');
        $this->template->set('title', 'รายการผู้เช่า');
        $this->template->load('default', 'contents', 'member/index', $data);
    }

    public function create()
    {
        $data = array();
        $data['title'] = "เพิ่มผู้เช่า";
        $data['prefixs'] = $this->Title_model->get_list();

        $this->check_auth('create');
        $this->template->set('title', 'เพิ่มผู้เช่า');
        $this->template->load('default', 'contents', 'member/create', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('first_name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('last_name', 'นามสกุล', 'required');
        $this->form_validation->set_rules('gender', 'เพศ', 'required');
        $this->form_validation->set_rules('birthday', 'วันเดือนปีเกิด', 'required');
        $this->form_validation->set_rules('idcard', 'หมายเลขบัตรประชาชน', 'required');
        $this->form_validation->set_rules('phone', 'หมายเลขโทรศัพท์มือถือ', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "เพิ่มผู้เช่า";
            $data['prefixs'] = $this->Title_model->get_list();
            //print_r($data);
            $this->check_auth('create');
            $this->template->set('title', 'เพิ่มผู้เช่า');
            $this->template->load('default', 'contents', 'member/create', $data);
        } else {
            $config['upload_path'] = './upload/member/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // ปรเเภทไฟล์ 
            $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
            $config['file_name'] = 'picture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
            $config['overwrite'] = true;
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            $file_name = "";
            if (!$this->upload->do_upload('picture')) {
                //กรณีมี Error ให้เก็บค่าไว้ในตัวแปร $error
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('member/index', $error);
            }
            $file_name = $this->upload->data('file_name');
            $data = array(
                'title_id' => $this->input->post('title_id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'birthday' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'idcard' => $this->input->post('idcard'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'name_workplace' => $this->input->post('name_workplace'),
                'address_workplace' => $this->input->post('address_workplace'),
                'phone_workplace' => $this->input->post('phone_workplace'),
                'name_emergency' => $this->input->post('name_emergency'),
                'phone_emergency' => $this->input->post('phone_emergency'),
                'image_profile' => $file_name,
                'timestamp_create' => date("Y-m-d H:i:s"),
                'timestamp_update' => date("Y-m-d H:i:s")
            );
            $this->Member_model->insert($data);
            $this->session->set_flashdata(
                array(
                    'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>'
                )
            );
            redirect(base_url('member/index'));
        }
    }

    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลผู้เช่า";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['member'] = $this->Member_model->get_one_list($id);

        $this->check_auth('show');
        $this->template->set('title', 'ข้อมูลผู้เช่า');
        $this->template->load('default', 'contents', 'member/show', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "แก้ไขผู้เช่า";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['member'] = $this->Member_model->get_one_list($id);

        $this->check_auth('edit');
        $this->template->set('title', 'แก้ไขผู้เช่า');
        $this->template->load('default', 'contents', 'member/edit', $data);
    }

    public function update()
    {
        $config['upload_path'] = './upload/member/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['file_name'] = 'picture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
        $config['overwrite'] = true;
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);
        $file_name = "";
        if (!$this->upload->do_upload('picture')) {
            //กรณีมี Error ให้เก็บค่าไว้ในตัวแปร $error
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('member/index', $error);
        }
        $file_name = $this->upload->data('file_name');
        $data = array(
            'title_id' => $this->input->post('title_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birthday' => $this->input->post('birthday'),
            'gender' => $this->input->post('gender'),
            'idcard' => $this->input->post('idcard'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'name_workplace' => $this->input->post('name_workplace'),
            'address_workplace' => $this->input->post('address_workplace'),
            'phone_workplace' => $this->input->post('phone_workplace'),
            'name_emergency' => $this->input->post('name_emergency'),
            'phone_emergency' => $this->input->post('phone_emergency'),
            'image_profile' => $file_name,
            'timestamp_update' => date("Y-m-d H:i:s")
        );

        $id = $this->input->post('id');

        $this->Member_model->update($data, $id);
        $this->session->set_flashdata(
            array(
                'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
            )
        );
        redirect('member/index', 'refresh');
    }

	public function delete(){

		$id = $this->uri->segment('3');

		$this->Member_model->delete($id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">ลบข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);
		redirect('member/index');
	}
}
