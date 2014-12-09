<?php

class orders extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('meli_items');
        $this->load->helper('form');
        $this->load->library('Meli');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('orders_model');
    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('orders/index');
        $this->load->view('templates/footer');
    }
    public function search_order()
    {
        $search_order_id = $this->input->post('search_order_id');
        $data["orders"] = $this->orders_model->search_por_id($search_order_id);
        $this->load->view('orders/searched_orders', $data);
    }
    public function search_meli()
    {
        $data['title'] = 'BUSQUEDA NUEVA';
        $search_string = $this->input->post('search_string');
        
        if ($search_string != NULL)
        {
            $data["meli_items"] = $this->meli_items->get_ipod($search_string);
        }
        
        $this->load->view('orders/list', $data);
    }
    public function save()
    {
        $this->form_validation->set_rules('order_id', 'order_id', 'required');
        $this->form_validation->set_rules('DNI', 'DNI', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        
        
        if ($this->form_validation->run() === true)
        {
            $order_id = $this->input->post('order_id');
            $DNI = $this->input->post('DNI');
            $name = $this->input->post('name');
            $itemArray = $this->input->post('items');
            foreach($itemArray as $item)
            {
                $meli_item_id = $item;
                $meli_item_title = $this->input->post('Titulo_'.$item);
                $meli_item_price = $this->input->post('Precio_'.$item);
                $meli_item_thumbnail_url = $this->input->post('Imagen_'.$item);
                $this->orders_model->savemodel
                        (
                        $meli_item_id,
                        $meli_item_title,
                        $meli_item_thumbnail_url,
                        $meli_item_price,
                        $order_id,
                        $DNI,
                        $name
                        );
            }
//            echo "<br><div>Los pedidos fueron guardados :) </div> <br>";
           // $this->load->view('orders/search_orders');
             $this->load->view('orders/guardados');
        }
        else
        {
            echo "<br><div>Pedidos no guardados - Falta Completar Algun Campo</div> <br>";
            $this->load->view('orders/search_orders');
        }
    }
    
    public function view()
    {
         $itemId = $this->input->post("id_0");
         
         $itemId = 'MLA522872652';
         //die(var_dump($itemId));
         
         $data['detalles'] = $this->meli_items->viewDetalles($itemId);
         $data['descripcion'] = $this->meli_items->viewDescription($itemId);
         $this->load->view('items/item_detail', $data);
    }
    public function success()
    {
         $this->load->view('orders/search_orders');
    }
}

?>
