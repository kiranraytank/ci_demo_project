<?php

class Blog extends CI_Controller {

    // show all blog (artical)
    public function index() {

        $this->load->helper('text');
        $this->load->model('Artical_model');
        $artical = $this->Artical_model->getArticalFront();

        $data['artical'] = $artical;
        $this->load->view("front/blog", $data);

    }
}