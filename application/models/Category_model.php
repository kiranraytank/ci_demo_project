<?php 
    defined("BASEPATH") OR exit("No direct script access allowed");;

    class Category_model extends CI_Model {
        public function create($formArry) {
            $this->db->insert('categories', $formArry);

        }

        public function getCategory($parames = []){
            if(!empty($parames['queryString'])){
                $this->db->like('name', $parames['queryString']);
            }
            $data = $this->db->get('categories')->result_array();

            // echo $this->db->last_query();
            return $data;
        }

        public function getCategoryRow($id) {
            $this->db->where('id', $id);
            $data = $this->db->get('categories')->row_array();

            return $data;
        }

        public function update($id, $formArray) {
            $this->db->where('id', $id);
            $data = $this->db->update('categories', $formArray);

            return;
        }

        public function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('categories');
            return;
        }
    }