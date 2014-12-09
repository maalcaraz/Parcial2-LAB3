<hr><br><h2>BUSCAR UNA ORDEN EN LA BASE DE DATOS</h2><br><hr><br>

<?php 

echo form_open('orders/search_order'); 
echo "<br><label>Order ID a BUSCAR: <label><br>";
echo form_input('search_order_id');
echo "<br><label>DNI a BUSCAR: <label><br>";
echo form_input('search_DNI');
echo "<br><br>";
echo form_submit("search_btn", "Buscar!");
echo "<br><br><hr>";
echo form_close();

?>