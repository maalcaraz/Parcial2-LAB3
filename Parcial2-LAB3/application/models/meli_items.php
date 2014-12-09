<?php

class meli_items extends CI_Model{
    function get_ipod($search_string)
    {
        $this->load->library('Meli');
        $params = array('q' => $search_string);
        $params["q"] = urlencode($search_string);
        return $this->meli->get("/sites/MLA/search?q=", $params);
    }
    
    function get_sites()
    {
        $this->load->library('Meli');
        return $this->meli->get("/sites/");
    }
    
    function search($site_id, $search_string)
    {
        $this->load->library('Meli');
        $params = array('q' => $search_string);
        
        $params["q"] = urlencode($search_string);
        
        return $this->meli->get("/sites/MLA/search", $params);
    }
    
    public function viewDetalles($itemId)
    {
        $this->load->library('Meli');
        return $this->meli->get("/items/".$itemId);
    }
    
    public function viewDescription($itemId)
    {
        $this->load->library('Meli');
        return $this->meli->get("/items/".$itemId.'/description');
    }
}

?>
