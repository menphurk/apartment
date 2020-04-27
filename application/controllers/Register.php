<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {

		parent::__construct();

		// load base_url
		$this->load->helper('url');

		$this->load->model('Member_model');

		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function saveRegister(){

		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'timestamp_create' => date("Y-m-d H:i:s"),
			'timestamp_update' => date("Y-m-d H:i:s")
		);

		$this->Member_model->insert($data);

		return true;

	}

}
