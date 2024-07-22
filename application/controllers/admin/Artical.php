<?php

class Artical extends CI_Controller {

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

    public function index($page = 1) {

        $par_page = 5; // apge page table row count
        $parames['offset'] = $par_page;
        $parames['limit'] = ($page*$par_page) - $par_page;
        $parames['q'] = $this->input->get("q");

        // $this->load->model("Category_model");
        // $category = $this->Category_model->getCategory();
        // $data['category'] = $category;
        
        $this->load->model("Artical_model");
        $this->load->library("pagination");
        $config['base_url'] = base_url('admin/artical/index/');
        $config['total_row'] = $this->Artical_model->getArticalCount();
        $config['par_page'] = $par_page;
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
        $pagination_link = $this->pagination->create_links();
        // redigne pagination par page number pendding


        $artical = $this->Artical_model->getArtical($parames);
        
        $data['q'] = $this->input->get('q');
        $data['artical'] = $artical;
        $data['pagination_link'] = $pagination_link;
        $data['mainModule'] = 'artical';
        $data['subModule'] = 'viewArtical';
        $this->load->view("admin/artical/list", $data);
    }


    //  this method can create artical
    public function create() {
        
        $this->load->helper("common_helper");
        $config['upload_path']          = './public/uploads/artical/thumb';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);


        // echo "data description";
        // echo json_decode($this->input->post);

        // get category data
        $this->load->model("Category_model");
        $category = $this->Category_model->getCategory();
        $data['category'] = $category;
        $data['mainModule'] = 'artical';
        $data['subModule'] = 'createArtical';

        $this->load->model("Artical_model");
        $this->load->library("form_validation");

        $this->form_validation->set_rules("title","title","trim|required");
        $this->form_validation->set_rules("category","category","trim|required"); 
        $this->form_validation->set_rules("author","author","trim|required");
        // $this->form_validation->set_rules("description","description","required");

        if($this->form_validation->run() == TRUE){

            // echo $_FILES['image']['name'];
            // echo 'if 1st';
            // echo '<br>';

            if(!empty($_FILES['image']['name'])){

                // echo 'if 2nd';

                if($this->upload->do_upload('image')){
                    // file uploaded successfullly
                    $data = $this->upload->data();
                    // echo 'if 3rd';

                    // resize image path
                    resize_image($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 30, 45);

                    $formArray['image'] = $data['file_name'];
                    $formArray['category']  = $this->input->post('category');
                    $formArray['title']     = $this->input->post('title');
                    $formArray['description']       = $this->input->post('description');
                    $formArray['author']    = $this->input->post('author');
                    $formArray['status']    = $this->input->post('status');
                    $formArray['created_at']    = date('Y-m-d H:i:s');
        
                    $this->Artical_model->create($formArray);
        
                    $this->session->set_flashdata('success','Added artical successfully');
                    redirect(base_url().'admin/artical/index');                    
                    
                }else {
                    $this->session->set_flashdata('error','Not Added artical successfully');
                    redirect(base_url().'admin/artical/index');                    
                    
                }
            } else {
                // without image artical uploaded
                $formArray['category']  = $this->input->post('category');
                $formArray['title']     = $this->input->post('title');
                $formArray['description'] = $this->input->post('description');
                $formArray['author']    = $this->input->post('author');
                $formArray['status']    = $this->input->post('status');
                $formArray['created_at']    = date('Y-m-d H:i:s');
                // $formArray['kkk'] = $this->input->post;
    
                $this->Artical_model->create($formArray);
    
                $this->session->set_flashdata('success','Added artical successfully');
                redirect(base_url().'admin/artical/index');                      
                
            }

        } else {
            echo '1st else called...';
            $this->load->view("admin/artical/create", $data);          
            
        }

    }


    // show artical page
    public function edit($id) {
        
        $this->load->library("form_validation");
        $this->load->model("Artical_model");
        $artical = $this->Artical_model->getArticalRow($id);

        if(empty($artical)){
            $this->session->set_flashdata("error","Something wrong");
            redirect(base_url()."admin/artical/index");
        }

        // get category data
        $this->load->model("Category_model");
        $category = $this->Category_model->getCategory();
        $data['category'] = $category;
        $data['artical'] = $artical;
        $data['mainModule'] = 'artical';
        $data['subModule'] = 'viewArtical';


        $this->load->helper("common_helper");
        $config['upload_path']          = './public/uploads/artical/thumb';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);


        // echo "data description";
        // echo json_decode($this->input->post);

        $this->form_validation->set_rules("title","title","trim|required");
        $this->form_validation->set_rules("category","category","trim|required"); 
        $this->form_validation->set_rules("author","author","trim|required");
        // $this->form_validation->set_rules("description","description","required");

        if($this->form_validation->run() == TRUE){

            
            if(!empty($_FILES['image']['name'])){

                // echo 'if 2nd';

                if($this->upload->do_upload('image')){
                    // file uploaded successfullly
                    $data = $this->upload->data();
                    // echo 'if 3rd';

                    // resize image path
                    resize_image($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 30, 45);

                    $formArray['image'] = $data['file_name'];
                    $formArray['category']  = $this->input->post('category');
                    $formArray['title']     = $this->input->post('title');
                    $formArray['description']       = $this->input->post('description');
                    $formArray['author']    = $this->input->post('author');
                    $formArray['status']    = $this->input->post('status');
                    $formArray['updated_at']    = date('Y-m-d H:i:s');
        
                    $this->Artical_model->edit($id, $formArray);
        
                    $this->session->set_flashdata('success','Edited artical successfully');
                    redirect(base_url().'admin/artical/index');                    
                    
                }else {
                    $this->session->set_flashdata('error','Not Edited artical successfully');
                    redirect(base_url().'admin/artical/index');                    
                    
                }
            } else {
                // without image artical uploaded
                $formArray['category']  = $this->input->post('category');
                $formArray['title']     = $this->input->post('title');
                $formArray['description'] = $this->input->post('description');
                $formArray['author']    = $this->input->post('author');
                $formArray['status']    = $this->input->post('status');
                $formArray['updated_at']    = date('Y-m-d H:i:s');
                // $formArray['kkk'] = $this->input->post;
    
                $this->Artical_model->edit($id, $formArray);
    
                $this->session->set_flashdata('success','Added artical successfully');
                redirect(base_url().'admin/artical/index');                      
                
            }

        } else {
            $this->load->view('admin/artical/edit', $data);
        }


    }

    //  this method can delete artical
    public function delete($artical_id) {
        if(empty($artical_id)) {
            $this->session->set_flashdata("error","Artical not found");
            redirect(base_url()."admin/artical/list");
        }
        $this->load->model("Artical_model");
        $this->Artical_model->delete($artical_id);

        $this->session->set_flashdata("success","Artical delete successfully");
        redirect(base_url().'admin/artical/index');     
    }
}