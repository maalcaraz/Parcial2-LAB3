<?php
class orders_model extends CI_Model{
    public function search_por_id($id)
    {
        $this->db->where('order_id', $id);
        $query = $this->db->get('orders');
        return $query->result_array();
    }
    
    function savemodel($meli_item_id,$meli_item_title,$meli_item_thumbnail_url,$meli_item_price,$order_id,$dni,$name)
    {
        $data = array
        (
          'meli_item_id' => $meli_item_id,
          'meli_item_title' => $meli_item_title,
          'meli_item_price' => $meli_item_price,
          'meli_item_thumbnail_url' => $meli_item_thumbnail_url,
          'order_id' => $order_id,
          'DNI' => $dni,
          'name' => $name
        );
        return $this->db->insert('orders', $data);
    }
}
