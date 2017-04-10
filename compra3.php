<?php
require_once('parametros.php');

//Insertar el billete en la base de datos.
print_r($_POST);

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión 
if (!$conn) 
   {die("Connection failed: " . mysqli_connect_error());}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");

//Calculamos el precio con una consulta concatenada
$sql = "SELECT ABS (o.Precio - d.Precio) AS precio FROM Tarifa AS o ";
$sql .= "JOIN Tarifa AS d JOIN Estacion AS eo ON o.ID_estacion_origen = Estacion.ID_estacion JOIN Estacion AS ed ON d.ID_estacion_destino = Estacion.ID_estacion";
$sql .= " WHERE eo.Nombre_estacion LIKE '". $_POST['EstacionOrigen']. "' AND ed.Nombre_estacion LIKE '". $_POST['EstacionDestino']."'";
echo $sql;

$result = mysqli_query($conn, $sql);
if (!$result){
      echo "Error en la consulta de precio: ".mysqli_error($conn);
      die;
}
$fila = mysqli_fetch_assoc($result);
$precio = $fila['precio'];

echo "El precio calculado es ".$precio;

foreach($_POST['asiento'] as $clave => $valor){//Los valores que se han introducido en la tabla de los asientos, se guardan en la variable $valor
  $sql = "INSERT INTO Billete (Tipo_descuento, Asiento, Precio_fin, Caducidad, Origen, Destino, Dia_viaje, Hora_salida, Hora_llegada) ";
  $sql .= " VALUES (";
    $sql .= '"'.$_POST['TIPODESCUENTO'].'", ';
    $sql .= '"'.$valor.'", ';
    $sql .= $precio.', ';       //precio_fin
    $sql .= '"2017-1-1", ';   //Caducidad //2016-12-31 00:00:00
    $sql .= '"'.$_POST['EstacionOrigen'].'", ';
    $sql .= '"'.$_POST['EstacionDestino'].'", ';
  $sql .= '"'.$_POST['FECHA'].'", ';
    $sql .= '0, ';    //Hora_salida
    $sql .= '0 )';    //Hora_llegada
  
    echo $sql;
  if (!mysqli_query($conn, $sql)){
      echo "Error en la inserción del billete: ".mysqli_error($conn);
    die;
}

echo "Billete/s insertado/s... espero";
}

die;
require_once('head.php');
//GUARDAR RESULTADO VARIABLE EN OTRA VARIABLE:		$Precio=$row['Precio'];
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión 
if (!$conn) 
   {die("Connection failed: " . mysqli_connect_error());}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");
$trayecto= $_POST['trayecto'];
$CANTIDADBILLETES= $_POST['CANTIDADBILLETES'];
$TIPODESCUENTO= $_POST['TIPODESCUENTO'];
$EstacionOrigen= $_POST['EstacionOrigen'];
$FECHA= $_POST['FECHA'];
$EstacionDestino= $_POST['EstacionDestino'];
$FECHA2= $_POST['FECHA2'];
$Asiento= $_POST['asiento'];

//VARIABLES:
//$Precio = $PrecioU * $CANTIDADBILLETES;
//$descuento = ($TIPODESCUENTO /100);
//$TOTAL = ($PrecioU - $descuento) * $CANTIDADBILLETES;

$sql3 = "select Nombre_estacion from Estacion where ID_estacion= $EstacionOrigen";
$resultado1 = mysqli_query($conn, $sql3);
$sql4 = "select Horario from Estacion where ID_estacion= $EstacionOrigen";
$resultado2 = mysqli_query($conn, $sql4);
$sql5 = "select Nombre_estacion from Estacion where ID_estacion= $EstacionDestino";
$resultado3 = mysqli_query($conn, $sql5);
$sql6 = "select Horario from Estacion where ID_estacion= $EstacionDestino";
$resultado4 = mysqli_query($conn, $sql6);
$auxiliar="$EstacionDestino - $EstacionOrigen";
//$sql5 = "select Precio from Tarifa where ID_estacion_origen_tray=($EstacionDestino - $EstacionOrigen)";
$sql7 = "select Precio from Tarifa where ID_estacion_origen_tray=($auxiliar)";
$resultado5 = mysqli_query($conn, $sql7);

//<form action="creaPDF.php" method="post">
//<input type="submit" value="GENERA PDF" name="submit" id="submit"></form>
?>

</br></br><form action="compra2.php" method="post">
<!--
DETRÁS DE LA PALABRA FORM:
action="realizarcompra.php" method="post"
--><center><table align="center" width="60%" border="1">
<!--
//$sql1 = "select Nombre_estacion from Estacion where ID_estacion= $EstacionOrigen";
//$resultado1 = mysqli_query($conn, $sql1);
-->
<!--   CONTENIDO PRIMERA FILA -->
<tr>
    <td width="60%"><b>Cantidad de billetes</b></td>
    <td>
<?php
      echo $CANTIDADBILLETES;
?>
    </td>
</tr>
<!--   CONTENIDO SEGUNDA FILA -->
<tr>
    <td width="60%"><b>Tipo descuento</b></td>
    <td>
<?php
      echo $TIPODESCUENTO;
?>
    </td>
</tr>
<!--   CONTENIDO TERCERA FILA -->
<tr>
    <td width="60%"><b>Estación Origen</b></td>
    <td>
<?php
while($row= mysqli_fetch_array($resultado1))
    {
      $EstacionOrigen=$row['Nombre_estacion'];
      echo $EstacionOrigen;
    }
?>
    </td>
</tr>
<!--
//$sql2 = "select Horario from Estacion where ID_estacion= $EstacionOrigen";
//$resultado2 = mysqli_query($conn, $sql2);
-->
<!--   CONTENIDO CUARTA FILA -->
<tr>
    <td width="60%"><b>Fecha salida</b></td>
    <td>
<?php
      echo $FECHA;
?>
    </td>
</tr>
<!--   CONTENIDO QUINTA FILA -->
<tr>
    <td width="60%"><b>Hora salida origen</b></td>
    <td>
<?php
while($row= mysqli_fetch_array($resultado2))
    {
      $Horasalida=$row['Horario'];
      echo $Horasalida;
    }
?>
    </td>
</tr>
<!--
//$sql3 = "select Nombre_estacion from Estacion where ID_estacion= $EstacionDestino";
//$resultado3 = mysqli_query($conn, $sql3);
-->
<!--   CONTENIDO SEXTA FILA -->
<tr>
    <td width="60%"><b>Estación Destino</b></td>
   <td>
<?php
while($row= mysqli_fetch_array($resultado3))
    {
      $EstacionDestino=$row['Nombre_estacion'];
      echo $EstacionDestino;
    }
?>
   </td>
</tr>
<!--
//$sql4 = "select Horario from Estacion where ID_estacion= $EstacionDestino";
//$resultado4 = mysqli_query($conn, $sql4);
-->
<!--   CONTENIDO SÉPTIMA FILA -->
<tr>
    <td width="60%"><b>Fecha llegada</b></td>
    <td>
<?php
      echo $FECHA2;
?>
    </td>
</tr>
<!--   CONTENIDO OCTAVA FILA -->
<tr>
    <td width="60%"><b>Hora llegada destino</b></td>
    <td>
<?php
while($row= mysqli_fetch_array($resultado4))
    {
      $Horallegada=$row['Horario'];
    echo $Horallegada;
    }
?>
    </td>
</tr>
<!--
//$sql5 = "select Asiento from Estacion where ID_estacion= $EstacionOrigen";
//$resultado5 = mysqli_query($conn, $sql5);
-->
<!--   CONTENIDO NOVENA FILA -->
<tr>
    <td width="60%"><b>Asiento del tren</b></td>
  <td>
<?php
      echo $Asiento;
  ?> 
    </td>
</tr>
<!--   CONTENIDO DÉCIMA FILA -->
<!-- select Precio from Tarifa where ID_estacion_origen_tray=(10-1);
| Precio |
|   6.00 |
1 row in set (0.00 sec) 

select * from Tarifa;
| ID_estacion_origen_tray | ID_estacion_destino | ID_estacion | Aplique_descuento | Precio |
|                       1 |                   2 |           0 |                 5 |   2.00 |
|                       2 |                   3 |           0 |                10 |   2.50 |
|                       3 |                   4 |           0 |                15 |   3.00 |
|                       4 |                   5 |           0 |                20 |   3.50 |
|                       5 |                   6 |           0 |                 5 |   4.00 |
|                       6 |                   7 |           0 |                 5 |   4.50 |
|                       7 |                   8 |           0 |                 5 |   5.00 |
|                       8 |                   9 |           0 |                 5 |   5.50 |
|                       9 |                  10 |           0 |                 5 |   6.00 |
|                      10 |                   1 |           0 |                 5 |   6.50 |
10 rows in set (0.00 sec)
-->
<tr>
    <td width="60%"><b>Precio unitario</b></td>
    <td>
<?php
while($row= mysqli_fetch_array($resultado5))      
		{
            $Preciou=$row['Precio'];  
            echo $Preciou;
            //echo $Precio;           
        }
?>
    </td>
</tr>

<!--
//Guarda los valores de los campos en variables, 
siempre y cuando se haya enviado el formulario, 
sino se guardará null.
$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : null;
-->
<!--   CONTENIDO UNDÉCIMA FILA -->
<tr>
    <td width="60%"><b>Precio unitario * cantidad de billetes</b></td>
    <td>
<?php
//$Preciou=$row['Precio'];
    $Preciot = $Preciou * $CANTIDADBILLETES;
     	echo $Preciot;
?>
    </td>
</tr>
<!--   CONTENIDO DUODÉCIMA FILA -->
<tr>
    <td width="60%"><b>TOTAL = (Precio total - Descuento) * Cantidad de billetes </b></td>
    <td><B>
<?php
//$Preciou=$row['Precio'];
       $Preciot = $Preciou * $CANTIDADBILLETES;
       $Descuento = $TIPODESCUENTO / 100;
       echo $Total = ($Preciot - $Descuento) * $CANTIDADBILLETES; 
?>
    </b></td>
</tr>
</table></center></div></br>
<?php
$sql = "insert into Billete (Tipo_descuento, Asiento, Precio_fin, Caducidad, Origen, Destino, Dia_viaje, Hora_salida, Hora_llegada) values ('$TIPODESCUENTO', '$Asiento', '$Total', '$FECHA2', '$EstacionOrigen', '$EstacionDestino','$FECHA', '$Horasalida', '$Horallegada')";

echo "<hr></br>sql= $sql </br></hr>";
echo "</br>";

if (mysqli_query($conn, $sql)) 
		{	echo "Registro insertado correctamente en la Base de datos Renfe</br>";	
		} 
			else {		echo "Error: </br>" . $sql . "</br>" . "</br>" . mysqli_error($conn);	}
mysqli_close($conn);
echo"</br>";
//target="_blank" --> 
//ES ABRIR EN UNA NUEVA VENTANA O PESTAÑA - 
echo "</br></br><center><p>El formulario ha sido enviado y almacenado en la base de datos, para proceder a imprimir los billetes, pulsa aquí:</center><p> <center><a href='generarpdf.php' target='_blank'>Imprimir billete('s)</a></center>";
?>
</br>
</br>
<!--
<center><b><font size="6"><form action="generarpdf.php" method="post">
<input type="submit" value="Imprimir billete ('s)" name="submit" id="submit"  enctype="multipart/form-data"><b></font></center></form></div>
-->
</body>
</html> 
