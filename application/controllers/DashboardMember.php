<?php


class DashboardMember extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		// load base_url
		$this->load->helper('url');
		$this->load->model('Bill_model');
		$this->load->model('Member_model');
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
		$data["bills"] = $this->Bill_model->getInvoiceMember($this->session->userdata( 'login_id' ));


		$this->check_auth('dashboard/index');
		$this->middle = 'dashboard/index';
		$this->data = $data;
		$this->layout();
	}

	public function profile(){

		$data = array();
		$data['profile'] = $this->Member_model->read_user($this->session->userdata( 'login_id' ));
		$this->check_auth('profile');
		$this->middle = 'profile';
		$this->data = $data;
		$this->layout();
	}

	public function updateprofile(){

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'idcard' => $this->input->post('idcard'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'timestamp_update' => date("Y-m-d H:i:s")
		);

		$id = $this->input->post('id');

		$this->Member_model->update($data, $id);
		$this->session->set_flashdata(
			array(
				'flash_message' => '<div class="alert alert-success alert-mg-b-0" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว!</div>'
			)
		);

		redirect('dashboardmember', 'refresh');
	}
}
