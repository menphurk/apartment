<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper(array('form', 'url'));

        $this->load->model('Member_model');
        $this->load->model('Title_model');

        $this->load->library("pagination");

    }

    public function check_auth($page) {
        if (!$this->session->userdata('login_id')) {
            $this->session->set_flashdata('msgerr', '<p class="login-box-msg" style="color:red;">จำเป็นต้องเข้าสู่ระบบก่อนใช้งาน</p>');
            redirect('login');
        }
    }

    public function index(){
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
        $this->template->load('default', 'contents' , 'member/index', $data);        
    }

    public function create()
    {

    }

    public function show()
    {
        $id = $this->uri->segment('3');

        $data = array();
        $data['title'] = "ข้อมูลผู้เช่า";
        $data['prefixs'] = $this->Title_model->get_list();
        $data['member'] = $this->User_model->get_one_list($id);

        $this->check_auth('show');
        $this->template->set('title', 'ข้อมูลผู้เช่า');
        $this->template->load('default', 'contents', 'member/show', $data);
    }
    
}