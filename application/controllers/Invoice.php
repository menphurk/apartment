<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{

	}

	function export()
	{

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('invoice/export',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output(); // opens in browser
		//$mpdf->Output('test.pdf','D'); // it downloads the file into the user system.

	}

}
