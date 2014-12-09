<?php
if (!empty($meli_items["body"]->results))
{
     echo "<div>";
     echo form_open('orders/save'); 
     
     $this->table->set_heading('Seleccionar','Imagen', 'Titulo', 'Precio');
     
     foreach ($meli_items["body"]->results as $item)
     {
         $checkbox = form_checkbox("items[]", $item->id) ;
         
         $title = anchor($item->permalink, $item->title) ;
         echo form_hidden("Titulo_".$item->id, $item->title);
         
         $img = img($item->thumbnail);
         echo form_hidden('Imagen_'.$item->id, $item->thumbnail);
         
         echo form_hidden('Precio_'.$item->id, $item->price);
     
         $this->table->add_row($checkbox,$img, $title, "$".$item->price); 
     }
     
     $plantilla = array ( 'table_open'  => '<table style="width:100%" border="5" cellpadding="2" cellspacing="1" class="mytable">' );
     $this->table->set_template($plantilla);
     
     echo $this->table->generate(); 
     
     echo "<br><hr><br><label>Order ID: <label><br>";
     echo form_input('order_id');
     echo "<br><label>DNI: <label><br>";
     echo form_input('DNI');
     echo "<br><label>Nombre: <label><br>";
     echo form_input('name');
     echo "<br><br>";
     echo form_submit("save_btn", "Guardar!");
     echo "<br><br><hr>";
     echo form_close();
     echo "</div>";
}
?>
