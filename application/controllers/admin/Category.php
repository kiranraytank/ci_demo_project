<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Category extends CI_Controller {

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

    public function index() {
        $this->load->model("Category_model");
        $queryString = $this->input->get("q");
        $parames['queryString'] = $queryString;

        $catogry = $this->Category_model->getCategory($parames);
        $data['category'] = $catogry;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'viewCategory';
        $this->load->view("admin/category/list", $data);
    }

    public function create() {
       
        $data['mainModule'] = 'category';
        $data['subModule'] = 'createCategory';

        $this->load->helper("common_helper");
        $config['upload_path']          = './public/uploads/category/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = true;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        
        $this ->load->model('Category_model');
        $this->load->library("form_validation");
        // $this->form_validation->set_error_delimiters('<p class="invalid-feedback">',"</p>");
        $this->form_validation->set_rules("name","Name","trim|required");

        if($this->form_validation->run() == TRUE){

            // echo $_FILES['image']['name'];
            // echo '<br>';

            if(!empty($_FILES['image']['name'])){

                if($this->upload->do_upload('image')){
                    // file uploaded successfullly
                    $data = $this->upload->data();

                    // resize image path
                    resize_image($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 30, 45);

                    $formArray['image'] = $data['file_name'];
                    $formArray['name']  = $this->input->post('name');
                    $formArray['status']        = $this->input->post('status');
                    $formArray['created_at']    = date('Y-m-d H:i:s');
        
                    $this->Category_model->create($formArray);
        
                    $this->session->set_flashdata('success','Added category successfully');
                    redirect(base_url().'admin/category/index');                    

                } else {
                    // file uploaded some error
                    $error = array('error' => $this->upload->display_errors());
                    $data['errorImageUpload'] = $error;     

                    $this->load->view("admin/category/create", $data);
                }

            }else{

                echo '123 else';

                $formArray['name'] = $this->input->post('name');
                $formArray['status'] = $this->input->post('status');
                $formArray['created_at'] = date('Y-m-d H:i:s');
    
                $this->Category_model->create($formArray);
    
                $this->session->set_flashdata('success','Added category successfully');
                redirect(base_url().'admin/category/index');
            }


        }else{
            // show error
            $this->load->view("admin/category/create", $data);
        }

    }
    public function edit($id){
        $this->load->model("Category_model");
        $category = $this->Category_model->getCategoryRow($id);
        $data['mainModule'] = 'category';
        $data['subModule'] = 'viewCategory';
        // echo $id;
        // echo $category['name'];


        if(empty($category)){
            $this->session->set_flashdata("error","Category not found");
            redirect(base_url()."admin/category/index");
        }else{
            $this->load->helper("common_helper");
            $config['upload_path']          = './public/uploads/category/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']         = true;
            $this->load->library('upload', $config);
            
            $this ->load->model('Category_model');
            $this->load->library("form_validation");
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">',"</p>");
            $this->form_validation->set_rules("name","name","trim|required");


            if($this->form_validation->run() == TRUE){
                
                    
                if(!empty($_FILES['image']['name'])){

                    if($this->upload->do_upload('image')){

                        // echo 'if......';

                        // file uploaded successfullly
                        $data = $this->upload->data();

                        // resize image path
                        resize_image($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 30, 45);

                        $formArray['image'] = $data['file_name'];
                        $formArray['name']  = $this->input->post('name');
                        $formArray['status']        = $this->input->post('status');
                        $formArray['updated_at']    = date('Y-m-d H:i:s');
            
                        $this->Category_model->update($id, $formArray);
            
                        $this->session->set_flashdata('success','Updated category successfully');
                        redirect(base_url().'admin/category/index');                    

                    } else {
                        // file uploaded some error
                        $error = array('error' => $this->upload->display_errors());
                        $data['errorImageUpload'] = $error;
                        $data['category'] = $category;
                        $data['mainModule'] = 'category';
                        $data['subModule'] = 'viewCategory';
                        $this->load->view("admin/category/edit", $data);
                    }

                }else{

                    // update category without image
                    $formArray['name'] = $this->input->post('name');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['updated_at'] = date('Y-m-d H:i:s');
        
                    $this->Category_model->update($id, $formArray);
        
                    $this->session->set_flashdata('success','Updated category successfully');
                    redirect(base_url().'admin/category/index'); 
                }

            }else{
                $data['category'] = $category;        
                $data['mainModule'] = 'category';
                $data['subModule'] = 'viewCategory';
                $this->load->view("admin/category/edit", $data);
            }
        }
    
    }

    public function delete($id) {
        $this->load->model("Category_model");
        $category = $this->Category_model->getCategoryRow($id);
        // echo $id;
        // echo $category['name'];

        if(empty($category)){
            $this->session->set_flashdata("error","Category not found");
            redirect(base_url()."admin/category/index");
        }

        $this->Category_model->delete($id);
        
        $this->session->set_flashdata('success','Added category successfully');
        redirect(base_url().'admin/category/index');                    


    }

}