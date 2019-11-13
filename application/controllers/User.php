<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));

        $this->load->model('User_model');
        $this->load->model('Title_model');

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
        $config["base_url"] = base_url() . "user/index";
        $config["total_rows"] = $this->User_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array();
        $data['title'] = "รายการผู้ใช้งานระบบ";
        $data["users"] = $this->User_model->get_paginate_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->check_auth('index');
        $this->template->set('title', 'รายการผู้ใช้งานระบบ');
        $this->template->load('default', 'contents' , 'user/index', $data);
    }

    public function create()
    {
        $data = array();
        $data['title'] = "สร้างผู้ใช้งานระบบ";
        $data['prefixs'] = $this->Title_model->get_list();
        //print_r($data);
        $this->check_auth('create');
        $this->template->set('title', 'สร้างผู้ใช้งานระบบ');
        $this->template->load('default', 'contents', 'user/create', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('title_id', 'คำนำหน้าชื่อ', 'required');
        $this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('email', 'อีเมล์', 'required');
        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้งาน', 'required');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('phone', 'เบอร์โทรศัพท์', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "สร้างผู้ใช้งานระบบ";
            $data['prefixs'] = $this->Title_model->get_list();
            $this->check_auth('create');
            $this->template->set('title', 'สร้างผู้ใช้งานระบบ');
            $this->template->load('default', 'contents', 'user/create', $data);
        } else {
            $data = array( 
                'title_id' => $this->input->post('title_id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'), 
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'timestamp_create' => date("Y-m-d H:i:s"),
                'timestamp_update' => date("Y-m-d H:i:s")
             );
            // $config['upload_path'] = './upload/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
            // $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
            // $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
            // $config['file_name'] = 'picture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
            // $config['encrypt_name']  = true;
         
            // $this->load->library('upload', $config);
            // $file_name = "";
            // if ( ! $this->upload->do_upload('picture')) {
            //     //กรณีมี Error ให้เก็บค่าไว้ในตัวแปร $error
            //     $error = array('error' => $this->upload->display_errors()); 

            //     $this->load->view('user/index', $error); 
            // }
            // $file_name = $this->upload->data('file_name');
            // $data = array( 
            //     'email' => $this->input->post('email'),
            //     'password' => md5($this->input->post('password')),
            //     'first_name' => $this->input->post('first_name'), 
            //     'last_name' => $this->input->post('last_name'),
            //     'birthday' => $this->input->post('birthday'),
            //     'gender' => $this->input->post('gender'),
            //     'address' => $this->input->post('address'),
            //     'phone' => $this->input->post('phone'),
            //     'picture' => $file_name,
            //     'timestamp_create' => date("Y-m-d H:i:s"),
            //     'timestamp_update' => date("Y-m-d H:i:s")
            //  );
                
            $this->User_model->insert($data); 

            redirect(base_url('user/index'));
        }
    }
    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลผู้ใช้งานระบบ";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['user'] = $this->User_model->get_one_list($id);

        $this->check_auth('show');
        $this->template->set('title', 'แก้ไขผู้ใช้งานระบบ');
        $this->template->load('default', 'contents', 'user/show', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "แก้ไขผู้ใช้งานระบบ";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['user'] = $this->User_model->get_one_list($id);

        $this->check_auth('edit');
        $this->template->set('title', 'แก้ไขผู้ใช้งานระบบ');
        $this->template->load('default', 'contents', 'user/edit', $data);
    }

    public function update()
    {
        $hash_password = $this->session->userdata('password');
        if($this->input->post('password') != null){
            $hash_password = md5($this->input->post('password'));
        }
        $data = array( 
            'title_id' => $this->input->post('title_id'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'), 
            'password' => $hash_password,
            'phone' => $this->input->post('phone'),
            'timestamp_update' => date("Y-m-d H:i:s")
         );
         
         $id = $this->input->post('id');
            
         $this->User_model->update($data,$id); 
         $this->session->set_flashdata(
            array(
                'flash_message'=> '<div class="alert alert-danger alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>')
            );
         redirect('user/index', 'refresh');
    }

    public function delete()
    {

    }
}
