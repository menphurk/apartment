<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load base_url
        $this->load->helper('url');

        $this->load->model('Home_model');
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $data["rooms"] = $this->Home_model->get_room();

        $this->template->set('title', 'Home');
        $this->template->loadhome('default', 'contents' , 'home/index', $data);
    }
    
    public function room()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $data["rooms"] = $this->Home_model->get_room();

        $this->template->set('title', 'Home');
        $this->template->loadhome('default', 'contents' , 'home/room', $data);
    }

    public function single_room()
    {
        $id = $this->uri->segment('2');

        header("Access-Control-Allow-Origin: *");
        $data = array();
        $data["room"] = $this->Home_model->get_one_room($id);

        $this->template->set('title', 'ห้องพักของเรา');
        $this->template->loadhome('default', 'contents' , 'home/single_room', $data);
    }

    public function about()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $this->template->set('title', 'เกี่ยวกับเรา');
        $this->template->loadhome('default', 'contents' , 'home/about', $data);
    }

    public function facilities()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $this->template->set('title', 'สิ่งอำนวยความสะดวก');
        $this->template->loadhome('default', 'contents' , 'home/facilities', $data);
    }

    public function contact()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();
        $this->template->set('title', 'ติดต่อเรา');
        $this->template->loadhome('default', 'contents' , 'home/contact', $data);
    }
}
