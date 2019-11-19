<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dorm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));

        $this->load->model('Dorm_model');
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
        $config["base_url"] = base_url() . "dorm/index";
        $config["total_rows"] = $this->Dorm_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array();
        $data['title'] = "รายการหอพัก";
        $data["dorms"] = $this->Dorm_model->get_paginate_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->check_auth('index');
        $this->template->set('title', 'รายการหอพัก');
        $this->template->load('default', 'contents', 'dorm/index', $data);
    }

    public function create()
    {
        $data = array();
        $data['title'] = "เพิ่มหอพัก";

        $this->check_auth('create');
        $this->template->set('title', 'เพิ่มหอพัก');
        $this->template->load('default', 'contents', 'dorm/create', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('name', 'ชื่อหอพัก', 'required');
        $this->form_validation->set_rules('address', 'ที่อยู่หอพัก', 'required');
        $this->form_validation->set_rules('phone', 'เบอร์โทรหอพัก', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "เพิ่มหอพัก";
            //print_r($data);
            $this->check_auth('create');
            $this->template->set('title', 'เพิ่มหอพัก');
            $this->template->load('default', 'contents', 'dorm/create', $data);
        } else {
            $config['upload_path'] = './upload/dorm/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
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

                $this->load->view('dorm/index', $error);
            }
            $file_name = $this->upload->data('file_name');
            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'images' => $file_name,
                'timestamp_create' => date("Y-m-d H:i:s"),
                'timestamp_update' => date("Y-m-d H:i:s")
            );
            $this->Dorm_model->insert($data);
            $this->session->set_flashdata(
                array(
                    'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>'
                )
            );
            redirect(base_url('dorm/index'));
        }
    }

    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลหอพัก";
        $data['dorm'] = $this->Dorm_model->get_one_list($id);

        $this->check_auth('show');
        $this->template->set('title', 'ข้อมูลหอพัก');
        $this->template->load('default', 'contents', 'dorm/show', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "แก้ไขหอพัก";
        $data['dorm'] = $this->Dorm_model->get_one_list($id);

        $this->check_auth('edit');
        $this->template->set('title', 'แก้ไขหอพัก');
        $this->template->load('default', 'contents', 'dorm/edit', $data);
    }

    public function update()
    {
        $config['upload_path'] = './upload/dorm/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
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

            $this->load->view('dorm/index', $error);
        }
        $file_name = $this->upload->data('file_name');
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'images' => $file_name,
            'timestamp_update' => date("Y-m-d H:i:s")
        );

        $id = $this->input->post('id');

        $this->Dorm_model->update($data, $id);
        $this->session->set_flashdata(
            array(
                'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
            )
        );
        redirect('dorm/index', 'refresh');
    }

    public function delete()
    { }
}
