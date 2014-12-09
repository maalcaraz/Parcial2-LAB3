<h1> Ingrese su nueva busqueda </h1>

<?php
echo "<div> Ingrese un Articulo";
echo form_open('orders/search_meli'); 
echo "<br>";
echo form_input('search_string');
echo form_submit('search_btn', "Buscar");
echo form_close();
echo "</div>";

?>
