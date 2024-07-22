<?php

class Page extends CI_Controller {

    public function about(){
        $this->load->view("front/about");
    }

    public function service(){
        $this->load->view("front/service");
    }
}