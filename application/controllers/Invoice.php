<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// load base_url
		$this->load->helper(array('form', 'url'));

		$this->load->model('Invoice_model');

		$this->load->library("pagination");

	}

	public function check_auth($page)
	{
		if (!$this->session->userdata('login_id')) {
			$this->session->set_flashdata('msgerr', '<p class="login-box-msg" style="color:red;">จำเป็นต้องเข้าสู่ระบบก่อนใช้งาน</p>');
			redirect('login');
		}
	}

	function index()
	{
		//Paginate//
		$config = array();
		$config["base_url"] = base_url() . "invoice/index";
		$config["total_rows"] = $this->Invoice_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = array();
		$data['title'] = "ใบแจ้งหนี้";
		$data["invoices"] = $this->Invoice_model->get_paginate_list($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->check_auth('index');
		$this->template->set('title', 'ใบแจ้งหนี้');
		$this->template->load('default', 'contents', 'invoice/index', $data);
	}

	function export()
	{
		$id = $this->uri->segment('3');

		$data = array();
		$data['title'] = "ใบแจ้งหนี้";
		$data['invoice'] = $this->Invoice_model->get_one_list($id);

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('invoice/export',$data,true);
		$mpdf->WriteHTML($html);
		/*$mpdf->Output(); // opens in browser*/
		$mpdf->Output('Invoice-'.$id.'.pdf','D'); // it downloads the file into the user system.

	}

}
