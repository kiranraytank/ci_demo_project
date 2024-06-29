<?php

class Home extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin) ==  true)
        {
            $this->session->set_flashdata('msg', 'Your session is expired');
            redirect(base_url().'admin/login/index');
        }
    }
    public function index(){
        $this->load->view("admin/dashboard");
    }
}