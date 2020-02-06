<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	//set the class variable.
	var $templates  = array();
	var $data      = array();
	//Load layout
	public function layout() {
		// making temlate and send data to view.
		$this->templates['header']   = $this->load->view('authmember/layout/header', $this->data, true);
		$this->templates['middle'] = $this->load->view('authmember/'.$this->middle, $this->data, true);
		$this->templates['footer'] = $this->load->view('authmember/layout/footer', $this->data, true);
		$this->load->view('authmember/layout/default', $this->templates);
	}
}
