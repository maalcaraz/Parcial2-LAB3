<hr><br><h2>RESULTADOS DE BUSQUEDA EN BASE DE DATOS </h2><br><hr><br>

<?php 

if (!empty($orders))
{
     echo "<div style='font-family:Calibri;' align='center'>";
     
     echo form_open('orders/view'); 
     
     $this->table->set_heading('Imagen', 'Titulo', 'Precio', 'Link');
     $contador = 0;
     foreach ($orders as $item)
     {
         $img = img($item["meli_item_thumbnail_url"]);
         $title = $item["meli_item_title"];
         $price = $item["meli_item_price"];
         
         $link = anchor('orders/view', 'Ver Detalle del Producto');
         //$link = anchor('https://api.mercadolibre.com/items/'.$item["meli_item_id"].'/description', 'Ver Detalle del Producto');
         
         echo form_hidden("id_".$contador, $item["meli_item_id"]);
         
         $contador++;
     
         $this->table->add_row($img, $title, "$".$price, $link); 
     }
     
     $plantilla = array ( 'table_open'  => '<table style="width:100%" border="5" cellpadding="2" cellspacing="1" class="mytable">' );
     $this->table->set_template($plantilla);
     
     echo $this->table->generate(); 
     
     echo form_close();
     echo "</div>";
}
?>