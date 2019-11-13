<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper('url');
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $this->template->set('title', 'Home');
        $this->template->load('default', 'contents' , 'dashboard/index', $data);
    }
}
