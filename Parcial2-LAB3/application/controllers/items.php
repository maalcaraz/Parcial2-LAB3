<?php
class Items  extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('meli_items');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->library('Meli');
    }
    
    public function index()
    {
        $data['title'] = 'Buscador';
        $search_string = $this->input->post('search_string');
        
        if ($search_string != NULL)
        {
            $data["meli_items"] = $this->meli_items->search("MLA", $search_string);
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('items/index', $data);
        $this->load->view('templates/footer');
    }
    
    /*public function view()
    {
         $itemId = $this->input->post('id_0');
         
         die(var_dump($itemId));
         
         $data['detalles'] = $this->meli_items->viewDetalles($itemId);
         $data['descripcion'] = $this->meli_items->viewDescription($itemId);
         $this->load->view('orders/item_detail', $data);
    }*/
    
    public function save()
    {
        die(var_dump($this->input->post('items')));
    }
    
}
