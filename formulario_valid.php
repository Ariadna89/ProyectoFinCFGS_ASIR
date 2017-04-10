<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/ico" />
<link href="css/css.css" rel="stylesheet" type="text/css" />                 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- Incluyo los Javascripts correspondientes al calendario -->
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/calendario.js"></script>
<script type='text/javascript' src='js/comprueba.js'></script>
<script type='text/javascript' src='validar.js'></script>
<script type='text/php' src='validarformulario.js'></script>
<script type="text/javascript" src="js/iniciar_calendarios.js"></script>
<script>
//Función permite
      function permite(elEvento, permitidos) {
        var numeros = "0123456789";
        var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ"
        var numeros_caracteres = numeros + caracteres;
        var teclas_especiales = [8, 37, 39, 46];
        switch(permitidos) {
          case 'num':
          permitidos = numeros;
          break;
          case 'car':
          permitidos = caracteres;
          break;
          case 'num_car':
          permitidos = numeros_caracteres;
          break;
        }
        var evento = elEvento || window.event;
        var codigoCaracter = evento.charCode || evento.keyCode;
        var caracter = String.fromCharCode(codigoCaracter);
        var tecla_especial = false;
        for(var i in teclas_especiales) {
          if(codigoCaracter == teclas_especiales[i]) {
            tecla_especial = true;
            break;
          }
        }
        return permitidos.indexOf(caracter) != -1 || tecla_especial;
      }

//Validar nombre
      function valNombre(){
        var valor = document.getElementById("NOMBRE").value;
        var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
        
        if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
          var textodiv = document.getElementById("name");
          textodiv.innerHTML="Introduzca un nombre";
          textodiv.style.color="red";
          return false;
        }
        else if( valor.length < 3 || valor.length > 20  ) {
          var textodiv = document.getElementById("name");
          textodiv.innerHTML="El tamaño del nombre no es el correcto";
          textodiv.style.color="red";
          return false;
        }
        else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
          var textodiv = document.getElementById("name");
          textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
          textodiv.style.color="red";
          return false;
        }
        for(var i=0;i<valor.length;i++){
          if(valor[i] == " "){
            if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
              var textodiv = document.getElementById("name");
              textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
              textodiv.style.color="red";
              return false;
            }
          }
        }
        var textodiv = document.getElementById("name");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }

//Validar APELLIDO1
      function valApellido(){
        var valor = document.getElementById("APELLIDO1").value;
        var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
        if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="Introduzca sus apellidos";
          textodiv.style.color="red";
          return false;
        }
        else if( valor.length < 4 || valor.length > 20  ) {
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="El tamaño de los apellidos no es el correcto";
          textodiv.style.color="red";
          return false;
        }
        else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
          textodiv.style.color="red";
          return false;
        }
        for(var i=0;i<valor.length;i++){
          if(valor[i] == " "){
            if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
              var textodiv = document.getElementById("lastname");
              textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
              textodiv.style.color="red";
              return false;
            }
          }
        }
        var textodiv = document.getElementById("lastname");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }

//Validar APELLIDO2
      function valApellido(){
        var valor = document.getElementById("APELLIDO2").value;
        var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
        if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="Introduzca sus apellidos";
          textodiv.style.color="red";
          return false;
        }
        else if( valor.length < 4 || valor.length > 20  ) {
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="El tamaño de los apellidos no es el correcto";
          textodiv.style.color="red";
          return false;
        }
        else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
          var textodiv = document.getElementById("lastname");
          textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
          textodiv.style.color="red";
          return false;
        }
        for(var i=0;i<valor.length;i++){
          if(valor[i] == " "){
            if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
              var textodiv = document.getElementById("lastname");
              textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
              textodiv.style.color="red";
              return false;
            }
          }
        }
        var textodiv = document.getElementById("lastname");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }

//Validar año de fecha de nacimiento
/*      function Anio(){
        var valor = parseInt(document.getElementById("anio").value);
        var fecha=new Date();
        var ANIO=fecha.getFullYear();
        if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          var textodiv = document.getElementById("Anio");
          textodiv.innerHTML="Ingrese un año";
          textodiv.style.color="red";
          return false;
        }
        if (!(/^\d{4}$/.test(valor))) {
          var textodiv= document.getElementById("Anio");
          textodiv.innerHTML="El numero debe de tener 4 digitos";
          textodiv.style.color="red";
          return false;
        }
        if (valor < 1900 || valor > (ANIO - 18)){
          var textodiv= document.getElementById("Anio");
          textodiv.innerHTML="Introduzca un año válido desde 1900 o es usted menor de edad";
          textodiv.style.color="red";
          return false;
        }
        var textodiv = document.getElementById("Anio");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }
*/      

//Validar DNI
      function valDni(){
        var valor = document.getElementById("DNI").value;
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
        if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          var textodiv= document.getElementById("identificacion");
          textodiv.innerHTML="Introduzca su DNI";
          textodiv.style.color="red";
          return false;
        }
        
        if( !(/^\d{8}[A-Z]$/.test(valor)) || valor.charAt(8) != letras[(valor.substring(0, 8))%23]) {
          var textodiv= document.getElementById("identificacion");
          textodiv.innerHTML="Introduzca su DNI correctamente";
          textodiv.style.color="red";
          return false;
        }
        
        var textodiv = document.getElementById("identificacion");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }

//Validar direccion
      function valDireccion() {
        var valor = document.getElementById("DIRECCION").value;
        
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          var textodiv = document.getElementById("DIRECCION");
          textodiv.innerHTML="Introduzca su dirección";
          textodiv.style.color="red";
          return false;
        }
        
        var textodiv = document.getElementById("DIRECCION");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }

//Validar telefono
      function Telefono(){
        var valor=document.getElementById("TELEFONO").value;
        var x=valor.split("");
        if( isNaN(valor) || valor == null || valor.length == (0) || /^\s+$/.test(valor) ) {
          var textodiv= document.getElementById("TELEFONO");
          textodiv.innerHTML="Introduzca su número de teléfono";
          textodiv.style.color="red";
          return false;
        }
        if (!(/^\d{9}$/.test(valor))) {
          var textodiv= document.getElementById("TELEFONO");
          textodiv.innerHTML="El numero debe de tener 9 digitos";
          textodiv.style.color="red";
          return false;
        }
        if (x[0] != 6 && x[0] != 7 && x[0] != 9){
          var textodiv= document.getElementById("TELEFONO");
          textodiv.innerHTML="El número debe empezar por 6,7 o 9";
          textodiv.style.color="red";
          return false;
        }
        var textodiv = document.getElementById("TELEFONO");
        textodiv.innerHTML="Ok";
        textodiv.style.color="green";
          
        return true;
      }


</script>
<title>Renfe</title>
<?php 
//require ("seguridad.php"); 
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

// conectamos con MySQL
$servername = "localhost";
$username = "root";
$password = "inves";
$dbname = "Renfe";
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
<input type="text" id="NOMBRE" name="NOMBRE" maxlength="30" onkeypress="return ' . permite(event,"car") . '" onblur="valNombre()" required />
        <p id="name"></p>
<span id="error_NOMBRE" class="error"></span>
</div>
<div>
<label for="APELLIDO1">APELLIDO1:<span class="required">*</span></label>
<input type="text" maxlength="30" id="APELLIDO1" name="APELLIDO1" size="50" onkeypress="return ' . permite(event,"car") . '" onblur="valApellido()" required/>
        <p id="lastname"/></p>
<span id="error_APELLIDO1" class="error"></span>
</div>
<div>
<label for="APELLIDO2">APELLIDO2:<span class="required">*</span></label>
<input type="text" id="APELLIDO2" maxlength="30" name="APELLIDO2" size="50" onkeypress="return ' . permite(event,"car") . '" onblur="valApellido()" required/>
        <p id="lastname"></p>
<span id="error_APELLIDO2" class="error"></span>
</div>
<div>
<label for="TELEFONO">Tel&eacute;fono:<span class="required">*</span></label>
<input type="text" id="TELEFONO" name="TELEFONO" size="9" maxlength="9" onkeypress="return ' . permite(event,"num") . '" onblur="Telefono()"/>
        <p id="TELEFONO"></p>
<span id="error_TELEFONO" class="error"></span>
</div>
<div>
<label for="DIRECCION">Direcci&oacute;n:<span class="required">*</span></label>
<input type="text" name="DIRECCION" id="DIRECCION" maxlength="30" size="50" onkeypress="' . permite(event,"num_car") .'" onblur="valDireccion()" required/>
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