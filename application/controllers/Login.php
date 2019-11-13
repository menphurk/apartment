<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct() {

        parent::__construct();
    
        // load base_url
        $this->load->helper('url');

        $this->load->model('User_model');

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
      }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $this->template->set('title', 'Home');
        $this->template->load('default', 'contents' , 'login/index', $data);
    }

    public function check_login()
    {
		if($this->input->server('REQUEST_METHOD') == TRUE){
			$this->form_validation->set_rules('username', 'ชื่อผู้ใช้งาน', 'required');
			$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
			if ($this->form_validation->run() == FALSE) {

				$this->template->load('default', 'contents' , 'login/index');

			}else{
				if($this->User_model->record_count($this->input->post('username'), $this->input->post('password')) == 1)
				{
					$result = $this->User_model->fetch_login($this->input->post('username'), $this->input->post('password'));
					$this->session->set_userdata(
						array(
							'login_id'    => $result->id,
							'username' => $result->username,
							'display_name'=> $result->name,
							'password' => $result->password,
						)
					);
					redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata(
						array(
							'flash_message'=> '<p class="login-box-msg" style="color:red;">ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!</p>')
						);
					redirect('/login', 'refresh');
				}
			}
        }
        
        
    }

	public function profile()
	{
		$data['result'] = $this->User_model->read_user($this->session->userdata('login_id'));
		$this->load->view('user/profile',$data);
    }
    
	public function postprofile()
	{
		if($this->input->server('REQUEST_METHOD') == TRUE)
		{
			$this->form_validation->set_rules('display_name', 'ชื่อแสดง', 'required', array('required'=> 'ค่าห้ามว่าง!'));
			if($this->User_model->record_count($this->input->post('email'),$this->input->post('password')) == 1 && $this->form_validation->run() == TRUE){
				$this->User_model->entry_user($this->session->userdata('login_id'));
				$this->session->set_userdata(array('display_name'=>$this->input->post('display_name')));
				redirect('admin','refresh');  //ให้วิ่งไปหน้านีหน้าแรก สำหรับ admin 
			}else{
				redirect('user/profile','refresh');
			}
		}
 
	}

    public function logout()
	{
		$this->session->unset_userdata(array('login_id','email','display_name'));
		redirect('/login', 'refresh');
	}
}