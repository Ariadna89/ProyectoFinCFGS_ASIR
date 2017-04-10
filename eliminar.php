<?php
//SOLO SE PUEDE ELIMINAR (DELETE) / MODIFICAR (UPDATE) / INSERTAR (INSERTAR) PARA EL USUARIO QUE HA INICIADO SESIÓN 
include ("menu.php");
require_once('parametros.php');
require_once('head.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 	{	die("Connection failed: " . mysqli_connect_error());	}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");
// borrar   
if(isset($_POST['Eliminar'])) {  // si ya viene del formulario
//DECLARAMOS VARIABLES:(RECIBIMOS LOS DATOS DEL FORMULARIO) SOLO SI VIENE UN FORMULARIO, CON UN ELIMINAR
//suponemos que la imagen es correcta
  $cuales=$_POST['Eliminar'];
  foreach ( $cuales as $valor )  { 
    $sql = "DELETE FROM Billete where Billete.ID_billete='$valor'";
/*					select * from Billete;
+------------+---------+----------------------+--------------+--------+---------------------+
| ID_billete | ID_tren | Tipo_descuento       | Asiento      | Precio | Caducidad           |
+------------+---------+----------------------+--------------+--------+---------------------+
| A1         |       1 | Carnet Joven <26 50% | Turista      |   9.99 | 2016-10-31 18:00:00 |
| B2         |       2 | Carnet >26 20%       | Turista Plus |   9.99 | 2016-10-31 18:00:00 |
| C3         |       3 | Familia numerosa 30% | Turista      |   9.99 | 2016-10-31 18:00:00 |
| D4         |       4 | Normal 0%            | Turista Plus |   9.99 | 2016-10-31 18:00:00 |
+------------+---------+----------------------+--------------+--------+---------------------+
+--------+----------------------+------------+----------+
| Origen | Destino              | Dia        | Hora     |
+--------+----------------------+------------+----------+
| Madrid | Almería              | 2016-10-16 | 21:37:05 |
| Madrid | Almería              | 2016-10-16 | 21:37:05 |
| Madrid | Valdepeñas           | 2016-10-16 | 21:37:05 |
| Madrid | Alcázar de San Juan  | 2016-10-16 | 21:37:05 |
+--------+----------------------+------------+----------+
4 rows in set (0.00 sec)						*/     
mysqli_query($conn, $sql);     }
echo count($cuales). " registros borrados".'</br>';	   }
//$sql = "SELECT Conyuges.DNI_conyuge, Conyuges.nombreconyuge, Conyuges.apellidosconyuge, Conyuges.sexoconyuge, Conyuges.direccionconyuge, Conyuges.imagenconyuge FROM Conyuges"
//ID_billete | Tipo_descuento   | Asiento | Precio_fin | Caducidad           | Origen      | Destino | Dia_salida | Hora_salida | Hora_llegada 
$sql = "SELECT Billete.ID_billete, Billete.Tipo_descuento, Billete.Asiento, Billete.Precio_fin, Billete.Caducidad, Billete.Origen, Billete.Destino, Billete.Dia_viaje, Billete.Hora_salida, Billete.Hora_llegada FROM Billete";
$resultado = mysqli_query($conn, $sql);
if (mysqli_num_rows($resultado) > 0) {  //cuantas filas >0
    // output data of each row
 echo " <div align='center'><form action='eliminar.php'  method='post'>";
 echo "</br></br><table border='2' align='center'>  ";
 $fila = mysqli_fetch_assoc($resultado);
 echo "<tr>";
 foreach ($fila as $indice=>$valor)  echo "<th> " . $indice. " </th> ";
 echo "<th> Selecciona </th> ";
 echo "</tr>";
 do  {
   echo "<tr>";
   echo "<td> " . $fila['ID_billete']. " </td> ";
   echo "<td> " . $fila['Tipo_descuento']. " </td> ";
   echo "<td> " . $fila['Asiento']. " </td> ";
   echo "<td> " . $fila['Precio_fin']. " </td> ";
   echo "<td> " . $fila['Caducidad']. " </td> ";
   echo "<td> " . $fila['Origen']. " </td> ";
   echo "<td> " . $fila['Destino']. " </td> ";
   echo "<td> " . $fila['Dia_viaje']. " </td> ";
   echo "<td> " . $fila['Hora_salida']. " </td> ";
   echo "<td> " . $fila['Hora_llegada']. " </td> ";
   $id=$fila['ID_billete'];
   echo "<td><input type='checkbox' name='Eliminar[]' value='$id' /> </td> ";
   echo "</tr>";
 } while($fila = mysqli_fetch_assoc($resultado));
 echo "</table></br>";
// formulario  cuadro de texto que te pregunte cual quiere borrar
 echo "<input type='submit' value='Eliminar' onClick='javascript: location=\"eliminar.php\";' /> </form><div/>";
} else {    echo "0 filas";	}	mysqli_close($conn);	?> 
</body>
</html> 
