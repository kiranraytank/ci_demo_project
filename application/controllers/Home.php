<?php 

    class Home extends CI_Controller {
        public function index() {

            $parmes['offset'] = 4;
            $parmes['limit']  = 0;
            $this->load->model("Artical_model");
            $articals = $this->Artical_model->getArticalFront($parmes);

            $data['articals'] = $articals;
            $this->load->view("front/home", $data);
        }
    }
