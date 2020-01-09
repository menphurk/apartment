<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><ul><li>', '</li></ul></div>');
	}
}
