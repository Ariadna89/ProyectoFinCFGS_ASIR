<?php
require_once('parametros.php');
require_once('head.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {    die("Connection failed: " . mysqli_connect_error());   }
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");
?>

<form align="center" action="estadistica2.php" method="post">
<center>
<font  size='6px'>
</br>
<input onclick='myFunction()' type='submit' value='ESTADISTICA' name='ESTADISTICA'/> 
</font>
</center>
</form>
