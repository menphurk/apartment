<?php


class DashboardMember extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		// load base_url
		$this->load->helper('url');
		$this->load->model('Bill_model');
	}

	public function check_auth($page)
	{
		if (!$this->session->userdata('login_id')) {
			$this->session->set_flashdata('msgerr', '<p class="login-box-msg" style="color:red;">จำเป็นต้องเข้าสู่ระบบก่อนใช้งาน</p>');
			redirect('login');
		}
	}

	public function index() {

		$data = array();
		$data["bills"] = $this->Bill_model->getInvoiceMember(1);


		$this->check_auth('dashboard/index');
		$this->middle = 'dashboard/index';
		$this->data = $data;
		$this->layout();
	}
}
