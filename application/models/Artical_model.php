<?php

class Artical_model extends CI_model {
    public function getArtical($parames = array()){
        if(!empty($parames) && isset($parames['q'])){
            $this->db->or_like("title", trim($parames['q']));
            $this->db->or_like("author", trim($parames['q']));
        }

        if(isset($parames['offset']) && isset($parames['limit'])){
            $this->db->limit($parames['offset'], $parames['limit']);
        }

        $artical = $this->db->get("artical")->result_array();
        // echo json_encode($artical);
        return $artical;
    }
    
    public function getArticalFront($parames = array()){
        
        if(isset($parames['offset']) && isset($parames['limit'])){
            $this->db->limit($parames['offset'], $parames['limit']);
        }

        $this->db->select('artical.*, categories.name as categories_name');
        $this->db->order_by('artical.created_at', 'DESC');

        $this->db->join('categories', 'categories.id = artical.category', 'left');

        $artical = $this->db->get("artical")->result_array();

        // echo $this->db->last_query();
        // echo json_encode($artical);
        return $artical;
    }

    public function getArticalCount($parames = array()){
        if(!empty($parames) && isset($parames['q'])){
            $this->db->or_like("title", trim($parames['q']));
            $this->db->or_like("author", trim($parames['q']));
        }

        $count = $this->db->count_all_results("artical");
        return $count;
    }



    public function getArticalRow($id) {
        $artical = $this->db->where("id", $id)->get("artical")->row_array();
        return $artical;
    }

    public function create($formdata) {
        // echo json_encode($formdata);
        $this->db->insert("artical", $formdata);
        return;
    }

    public function edit($id, $formdata) {
        $this->db->where("id", $id);
        $artical = $this->db->update("artical", $formdata);
        return;
    }

    public function delete($artical_id) {
        $this->db->where("id", $artical_id);
        $this->db->delete("artical");
        return;
    }
}