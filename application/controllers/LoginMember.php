<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginMember extends CI_Controller
{
	public function __construct() {

		parent::__construct();

		// load base_url
		$this->load->helper('url');

		$this->load->model('Member_model');

		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function authencation()
	{
		if($this->input->server('REQUEST_METHOD') == TRUE){
			if($this->Member_model->record_count($this->input->post('username'), $this->input->post('password')) == 1)
			{
				$result = $this->Member_model->fetch_login($this->input->post('username'), $this->input->post('password'));
				$this->session->set_userdata(
					array(
						'login_id'    => $result->id,
						'username' => $result->username,
						'display_name'=> $result->first_name.$result->last_name,
						'password' => $result->password,
					)
				);
				redirect('dashboardmember');
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

	public function logout()
	{
		$this->session->unset_userdata(array('login_id','email','display_name'));
		redirect('/', 'refresh');
	}
}
