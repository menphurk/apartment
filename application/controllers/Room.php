<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));

        $this->load->model('Room_model');
        $this->load->model('Statusroom_model');
        $this->load->model('Typeroom_model');

        $this->load->library("pagination");
    }

    public function check_auth($page) {
        if (!$this->session->userdata('login_id')) {
            $this->session->set_flashdata('msgerr', '<p class="login-box-msg" style="color:red;">จำเป็นต้องเข้าสู่ระบบก่อนใช้งาน</p>');
            redirect('login');
        }
    }

    public function index()
    {
        //Paginate//
        $config = array();
        $config["base_url"] = base_url() . "room/index";
        $config["total_rows"] = $this->Room_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array();
        $data['title'] = "รายการห้องพัก";
        $data["rooms"] = $this->Room_model->get_paginate_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->check_auth('index');
        $this->template->set('title', 'รายการห้องพัก');
        $this->template->load('default', 'contents' , 'room/index', $data);   
    }

    public function create()
    {
        $data = array();
        $data['title'] = "เพิ่มห้องพัก";
        $data['statusrooms'] = $this->Statusroom_model->get_list();
        $data['typerooms'] = $this->Typeroom_model->get_list();
        //print_r($data);
        $this->check_auth('create');
        $this->template->set('title', 'เพิ่มห้องพัก');
        $this->template->load('default', 'contents', 'room/create', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('name', 'ชื่อห้อง', 'required');
        $this->form_validation->set_rules('type_room_id', 'ประเภทห้อง', 'required');
        $this->form_validation->set_rules('price', 'ราคาห้อง', 'required');
        $this->form_validation->set_rules('code_place_room', 'รหัสอาคารห้องพัก', 'required');
        $this->form_validation->set_rules('code_floor_room', 'รหัสชั้นห้องพัก', 'required');
        $this->form_validation->set_rules('num_people', 'จำนวนคน', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "เพิ่มห้องพัก";
            $data['statusrooms'] = $this->Statusroom_model->get_list();
            $data['typerooms'] = $this->Typeroom_model->get_list();
            //print_r($data);
            $this->check_auth('create');
            $this->template->set('title', 'เพิ่มห้องพัก');
            $this->template->load('default', 'contents', 'room/create', $data);
        }else{
            $config['upload_path'] = './upload/room/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // ปรเเภทไฟล์ 
            $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
            $config['file_name'] = 'picture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
            $config['overwrite'] = true;
            $config['encrypt_name']  = true;
         
            $this->load->library('upload', $config);
            $file_name = "";
            if ( ! $this->upload->do_upload('picture')) {
                //กรณีมี Error ให้เก็บค่าไว้ในตัวแปร $error
                $error = array('error' => $this->upload->display_errors()); 

                $this->load->view('room/index', $error);
            }
            $file_name = $this->upload->data('file_name');
            $data = array(
               'name' => $this->input->post('name'),
               'type_room_id' => $this->input->post('type_room_id'),
               'price' => $this->input->post('price'),
               'code_place_room' => $this->input->post('code_place_room'),
               'code_floor_room' => $this->input->post('code_floor_room'),
               'num_people' => $this->input->post('num_people'),
               'image' => $file_name,
            );
            $this->Room_model->insert($data); 
            $this->session->set_flashdata(
                array(
                    'flash_message'=> '<div class="alert alert-success alert-mg-b-0" role="alert">เพิ่มข้อมูลเรียบร้อยแล้ว!</div>')
                );
            redirect(base_url('room/index'));
        }
    }
    
    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลห้องพัก";
        $data['statusrooms'] = $this->Statusroom_model->get_list();
        $data['typerooms'] = $this->Typeroom_model->get_list();
        $data['room'] = $this->Room_model->get_one_list($id);

        $this->check_auth('edit');
        $this->template->set('title', 'ข้อมูลห้องพัก');
        $this->template->load('default', 'contents', 'room/show', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "แก้ไขห้องพัก";
        $data['statusrooms'] = $this->Statusroom_model->get_list();
        $data['typerooms'] = $this->Typeroom_model->get_list();
        $data['room'] = $this->Room_model->get_one_list($id);

        $this->check_auth('edit');
        $this->template->set('title', 'แก้ไขห้องพัก');
        $this->template->load('default', 'contents', 'room/edit', $data);
    }

    public function update()
    {
        $config['upload_path'] = './upload/room/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['file_name'] = '';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
        $config['encrypt_name']  = true;
     
        $this->load->library('upload', $config);
        $file_name = "";
        if ( ! $this->upload->do_upload('picture')) {
            //กรณีมี Error ให้เก็บค่าไว้ในตัวแปร $error
            $error = array('error' => $this->upload->display_errors()); 

            $this->load->view('room/index', $error);
        }
        $file_name = $this->upload->data('file_name');

        $data = array(
           'name' => $this->input->post('name'),
           'type_room_id' => $this->input->post('type_room_id'),
           'price' => $this->input->post('price'),
           'code_place_room' => $this->input->post('code_place_room'),
           'code_floor_room' => $this->input->post('code_floor_room'),
           'num_people' => $this->input->post('num_people'),
           'image' => $file_name,
        );

        $id = $this->input->post('id');
            
        $this->Room_model->update($data,$id); 
        $this->session->set_flashdata(
           array(
               'flash_message'=> '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>')
           );
        redirect(base_url('room/index'));
    }

    public function delete()
    {
        $id = $this->uri->segment('3'); 
         
        $this->Room_model->delete($id); 
        $this->session->set_flashdata(
            array(
                'flash_message'=> '<div class="alert alert-success alert-mg-b-0" role="alert">ลบข้อมูลเรียบร้อยแล้ว!</div>')
            );
        redirect(base_url('room/index'));
    }
}
