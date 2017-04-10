<?php
require_once('parametros.php');
require_once('head.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {    die("Connection failed: " . mysqli_connect_error());   }
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");
$concat="SELECT CONCAT(Nombre_estacion, ' / ', Provincia, ' - ', Horario) as listaorigen, ID_Estacion as ID from Estacion;";
$concat2="SELECT CONCAT(Nombre_estacion, ' / ', Provincia, ' - ', Horario) as listaorigen2, ID_Estacion as ID2 from Estacion;";
$sql2=mysqli_query($conn,$concat);
$sql3=mysqli_query($conn,$concat2);
?>

<form align="center" action="compra2.php" method="post">
<fieldset style="margin:auto" padding="auto"> <!-- AGRUPA LOS CAMPOS DEL FORMULARIO -->
<legend>COMPRA BILLETE</legend>
<div><label>¿Qué tipo de trayecto vas a realizar?</label></br>
<input type="radio" name="trayecto" value="ida"/> Ida
<input type="radio" name="trayecto" value="vuelta"/> Vuelta
<input type="radio" name="trayecto" value="idayvuelta"/> Ida y Vuelta</div></br>

<div>
<label>¿Cuántos billetes deseas?</label></br>
<label><select name="CANTIDADBILLETES"> 
<?php
for($a=1; $a <=20; $a++) {
echo "<option>";
echo $a;
echo "</option>";
}
?>
</select></label></div></br>

<!-- HACER QUE VISUALICE EL DESCUENTO EN NÚMEROS PARA QUE A LA HORA DE SEGUIR A LA SIGUIENTE PÁGINA LE COJA EL NÚMERO Y PUEDA HACER EL DESCUENTO EN CÁLCULOS
ES DECIR, HACER EL CÁLCULO DE LA CANTIDAD DE BILLETES ESCOGIDOS, MULTIPLICADO POR EL PRECIO, MENOS EL DESCUENTO... -->
<div>
<label>Tipo descuento a realizar</label></br>
<select name="TIPODESCUENTO">
<option>Ninguno</option>
<option>Carnet Joven</option>
<option>Jubilado</option>
<option>Familia numerosa</option>
</select>
</div></br>


<div>
<label for="ORIGEN">Estación de Origen: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</label><label for="FECHA">Elige una fecha:</label>
</div>

<div>
<select name="EstacionOrigen">
<?php
while ($valor=mysqli_fetch_array($sql2)) {
    echo '<option>'.$valor["listaorigen"].'</option>';
}   ?>
</select>

<?php
echo '&nbsp;&nbsp;&nbsp;&nbsp;
<!--    ponemos la fecha actual    -->
<input type="text" name="FECHA" id="FECHA" size="10" value="' . date("Y-m-d") . '"> ';
?>
</div>
</br>

<div>
<label for="DESTINO">Estación de Destino:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="FECHA">Elige una fecha:</label>
</div>

<div>
<select name="EstacionDestino">
<?php
while ($valor2=mysqli_fetch_array($sql3)) {
    echo '<option>'.$valor2["listaorigen2"].'</option>';
}   ?>
</select>

<?php
echo '&nbsp;&nbsp;&nbsp;&nbsp;
<!--    ponemos la fecha actual    -->
<input type="text" name="FECHA2" id="FECHA2" size="10" value="' . date("Y-m-d") . '"> ';
?></div>
<!-- PARA HACER UN ARRAY CON EL TREN -->
<!--
/*
echo "</br></br></br></br></br></br><center><p>El billete se ha comprado satisfactoriamente y se ha almacenado en la base de datos, ahora para ver su billete pulse aquí:</center><p> <center><a href='generarpdf.php'>Imprimir Billete</a></center>";      
?>
*/
-->

<center><font  size='6px'></br>
<input onclick='myFunction()' type='submit' value='ELEGIR ASIENTO' name='ELEGIR_ASIENTO'/> </font></center>
</fieldset></form>
<!-- Crear botón para que genere un PDF con la compra del billete -->

<!--
<form action="creaPDF.php" method="post">
<input type="submit" value="GENERA PDF" name="submit" id="submit"></form>
-->
</body>
</html>
