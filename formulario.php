<?php 
require_once('head.php');
require ("seguridad.php"); 
require_once('parametros.php');
require_once("clave_aleatoria.php");
//require_once("comprobaciones.php");
//DESPUES DE INSERTAR, SE VEAN LOS DATOS INSERTADOS EN UNA TABLA HTML, INCLUYENDO
if(isset($_POST['DNI'])) {  /*Han enviado el formulario*/
// Recibimos lo datos del formulario
$DNI=$_POST['DNI'];
$NOMBRE=$_POST['NOMBRE'];
$APELLIDO1=$_POST['APELLIDO1'];
$APELLIDO2=$_POST['APELLIDO2'];
$TELEFONO=$_POST['TELEFONO'];
$DIRECCION=$_POST['DIRECCION'];
$SEXO=$_POST['SEXO'];
//suponemos que la imagen es correcta
$uploadOk = 1;
$Imagen=basename($_FILES['Imagen']['name']);
$tmp=$_FILES['Imagen']['tmp_name'];
$destino="imagenes/$Imagen";
$EDAD=$_POST['EDAD'];
$FECHA=$_POST['FECHA'];
$NIVEL=$_POST['NIVEL'];
$clave=$_POST['clave'];

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión 
if (!$conn) 
   {die("Connection failed: " . mysqli_connect_error());}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
  mysqli_set_charset($conn,"utf8");

//INSERTAMOS LOS DATOS INTRODUCIDOS EN EL FORMULARIO DE REGISTRO EN LA TABLA Cliente de la base de datos Renfe:
$sql="Insert into Renfe.Cliente (DNI, NOMBRE, APELLIDO1, APELLIDO2, Telefono, Direccion, Sexo, Imagen, Edad, Fecha_nacimiento, Nivel, Clave) Values ('$DNI', '$NOMBRE', '$APELLIDO1', '$APELLIDO2', '$TELEFONO', '$DIRECCION', '$SEXO', '$Imagen', '$EDAD', '$FECHA', '$NIVEL', '$clave')";

//CLAVE CIFRADA, LO DEJAREMOS SIN CIFRAR POR ALGUN DESPISTADO
//$sql="Insert into Renfe.Cliente (DNI, NOMBRE, APELLIDO1, APELLIDO2, Telefono, Direccion, Sexo, Imagen, Edad, Fecha_nacimiento, Nivel, Clave) Values ('$DNI', '$NOMBRE', '$APELLIDO1', '$APELLIDO2', '$TELEFONO', '$DIRECCION', '$SEXO', '$Imagen', '$EDAD', '$FECHA', '$NIVEL', MD5('$clave'))";
//Clave=MD5('$clave')

if (mysqli_query($conn, $sql)) {
  if (copy($tmp, $destino)) {
// Se muestra la tabla html
// esta parte visualiza la tabla completa
//$credenciales = "SELECT ID, NOMBRE, Nivel FROM Acceso WHERE ID='$dni' AND Clave=MD5('$clave')";
//YA ALMACENA LOS DATOS EN LA BASE DE DATOS, Clave no se guarda así, si no, sin MD5
//$sql = "select DNI, NOMBRE, APELLIDO1, APELLIDO2, Sexo, Telefono, Direccion, Imagen, Edad, Fecha_nacimiento, Nivel, Clave=MD5('$CLAVE') from Cliente;";
//COMO YA LO ALMACENA, RETIRO EL SELECT PARA QUE DIRECTAMENTE SE VAYA A UN PANEL DE CREDENCIALES Y LOS USUARIOS PUEDAN ACCEDER A SU COMPRA DE BILLETES:
//$sql = "select DNI, NOMBRE, APELLIDO1, APELLIDO2, Telefono, Direccion, Sexo, Imagen, Edad, Fecha_nacimiento, Nivel, Clave from Cliente;";
$resultado = mysqli_query($conn, $sql);
if ($resultado) {  //cuantas filas >0
// output data of each row
//echo " <form action='index2.php'  method='post' enctype='multipart/form-data'>";
?>

<!--<?php header("Location: login.php"); ?> -->
<style>
/*
QUEREMOS QUE LOS USUARIOS CUANDO ACCEDAN A RENFE, TENGAN QUE RELLENAR UN FORMULARIO DE REGISTRO Y CON EL MISMO REGISTRO PUEDAN ACCEDER DESPUÉS A LA COMPRA DE SUS RESPECTIVOS BILLETES DE TREN.
CON ESTO CONSEGUIMOS QUE RENFE TENGA UNA BASE DE DATOS DE TODOS SUS CLIENTES, CON SUS COMPRAS DE BILLETES Y ASÍ POSTERIORMENTE LLEVAR UN REGISTRO Y DIFERENTES ESTADÍSTICAS.
*/
</style>
<style type="text/css" media="all">
</style>
</head>
<body>
<?php
echo "
<title>Cliente</title>
<style type='text/css'>
span {color: white;}
.error { color: red; display: none;}
</style>
<script type='text/php' src='validarformulario.js'></script>
<h3>TABLA GENERAL DE LOS CLIENTES</h3>
<table border='2' align='center'>  ";
       $fila = mysqli_fetch_assoc($resultado);
       echo "<tr>";
       foreach ($fila as $indice=>$valor)  echo "<th> " . $indice. " </th> ";
       echo "</tr>";
    do  { 
       echo "<tr>";
       echo "<td> " . $fila['DNI']. " </td> ";
       echo "<td> " . $fila['NOMBRE']. " </td> ";
       echo "<td> " . $fila['APELLIDO1']. " </td> ";
       echo "<td> " . $fila['APELLIDO2']. " </td> ";
       echo "<td> " . $fila['Telefono']. " </td> ";
       echo "<td> " . $fila['Direccion']. " </td> ";
       echo "<td> " . $fila['Sexo']. " </td> ";
if ($fila['Imagen'] == "" || $fila['Imagen'] == NULL || !file_exists('imagenes/' . $fila['Imagen'])) 
//COMPRUEBA SI EN LA BBDD LA COLUMNA DE LA IMAGEN ES NULA O SI NO ES NULA (VACIO), COMPRUEBA SI EXISTE EN EL DIRECTORIO DE LA IMAGEN
       echo "<td><img src='imagenes/defecto.jpg' width='100' alt='nada'> </td> ";
   else
       echo "<td><img src='imagenes/" . $fila['Imagen'] . "' width='100' alt='nada'> </td> ";
       $id=$fila['DNI'];
       echo "<td> " . $fila['Edad']. " </td> ";
       echo "<td> " . $fila['Fecha_nacimiento']. " </td> ";
       echo "<td> " . $fila['Nivel']. " </td> ";
       echo "<td> " . $fila['Clave']. " </td> ";
       echo "</tr>";
     } while($fila = mysqli_fetch_assoc($resultado));
echo "</table></br>";
} else {
    echo "</br></br></br></br></br></br><center><p>El formulario ha sido enviado y almacenado en la base de datos, ahora para iniciar sesión pulsa aquí:</center><p> <center><a href='login.php'>Inicio de sesión</a></center>";
//<form action="creaPDF.php" method="post">
//<input type="submit" value="GENERA PDF" name="submit" id="submit"></form>

}/* <input type='submit' value='Enviar' name='submit' id='submit'> // <?php header("Location: login.php"); ?> */
    } else 
          {echo "Lo siento, ha ocurrido un fallo al subir el fichero.";}
}else
{echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

mysqli_close($conn);
}
// Esto se visualiza la primera vez, antes de enviar el formulario
else { echo '
<?php
?>
<style type="text/css">
span {color: white;}
span.required {color: red};
.error { color: red; display: none;}
</style>
<title>Formulario</title>
<script type="text/php" src="validarformulario.js"></script>
<h3></h3>
<form action="formulario.php" method="post" enctype="multipart/form-data" >
<fieldset style="margin:auto"> <!-- AGRUPA LOS CAMPOS DEL FORMULARIO -->
<legend>FORMULARIO REGISTRO</legend>
<div>
<label for="DNI">DNI:<span class="required">*</span></label>
<input type="text" id="DNI" onblur="valDni()" required name="DNI" size="10" maxlength="10" /><p id="identificacion"></p>
<span id="error_DNI" class="error"></span>
</div>
<div>
<label for="NOMBRE">NOMBRE:<span class="required">*</span></label>   
<input type="text" id="NOMBRE" name="NOMBRE" maxlength="30" onblur="valNombre()" required />
        <p id="name"></p>
<span id="error_NOMBRE" class="error"></span>
</div>
<div>
<label for="APELLIDO1">APELLIDO1:<span class="required">*</span></label>
<input type="text" maxlength="30" id="APELLIDO1" name="APELLIDO1" size="50" onblur="valApellido()" required/>
        <p id="lastname"/></p>
<span id="error_APELLIDO1" class="error"></span>
</div>
<div>
<label for="APELLIDO2">APELLIDO2:<span class="required">*</span></label>
<input type="text" id="APELLIDO2" maxlength="30" name="APELLIDO2" size="50" onblur="valApellido()" required/>
        <p id="lastname"></p>
<span id="error_APELLIDO2" class="error"></span>
</div>
<div>
<label for="TELEFONO">Tel&eacute;fono:<span class="required">*</span></label>
<input type="text" id="TELEFONO" name="TELEFONO" size="9" maxlength="9" onblur="Telefono()"/>
        <p id="TELEFONO"></p>
<span id="error_TELEFONO" class="error"></span>
</div>
<div>
<label for="DIRECCION">Direcci&oacute;n:<span class="required">*</span></label>
<input type="text" name="DIRECCION" id="DIRECCION" maxlength="30" size="50" onblur="valDireccion()" required/>
        <p id="DIRECCION"></p></div>
<div>
<label for="SEXO">Sexo:<span class="required">*</span></label>
<input type="radio" onblur="validarSexo()" name="SEXO" value="hombre" id="hombre" checked /> Hombre 
<input type="radio" name="SEXO" value="mujer" id="mujer" /> Mujer <p id="sex"></p>
</div>

<div>
<label for="Imagen">Selecciona la imagen que deseas subir:<span class="required">*</span></label>
<input type="file" name="Imagen" id="Imagen">
</div>
<div>
<label for="EDAD">¿Cu&aacute;l es t&uacute; edad?<span class="required">*</span></label>
<input type="text" name="EDAD" id="EDAD" size="3">
<span id="error_EDAD" class="error"></span>
</div>
<div>
<label for="FECHA">Fecha de nacimiento:<span class="required">*</span></label>
<!--    ponemos la fecha actual    -->
<input type="text" name="FECHA" id="FECHA" size="10" value="' . date("Y-m-d") . '"></div> ';
/*
<div>
<label for="FECHA">Fecha de nacimiento:</label>
<!--    ponemos la fecha actual    -->
<input type="text" name="FECHA" id="FECHA" size="10" value="' . date("Y-m-d") . '"></div> ';
*/
echo '
<div>
<label for="NIVEL">Nivel:</label>
<input type="text" name="NIVEL" value="1" readonly /></div>'; 

echo'
<div>
<label for="clave">Clave:</label>
<input type="text" name="clave" value="' .generaPass() . '" readonly /></div>
';

// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
//  mysqli_set_charset($consultar,"utf8");

/*
<form action="login.php" method="post">
<input type="submit" value="Iniciar sesión" name="submit" id="submit">
*/
echo'</br>
<div align="center">
<input type="submit" value="Enviar" name="submit" id="submit"></div></br>
<div align="center">
<a class="boton"> </a><input type="reset" value="Borrar datos" name="reset" id="reset"></div>
</fieldset>
</form></br>
';}
?>
<script>
</script>
</body>
</html>