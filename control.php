<?php
// Credenciales para conectar a la base de datos 'WeddingBells'.
$consultar = mysqli_connect("localhost", "root", "inves", "Renfe");
// Compruebo si es posible conectar a la base de datos.
// Si no es posible conectar a la base de datos, devuelvo un mensaje en la página de inicio.
if (!$consultar) {
  header("Location: login.php?errlog=desc");
		 }
// Cambio la codificación de las consultas a UTF-8 --> NO FALLAN LETRAS RARAS COMO LA Ñ.
mysqli_set_charset($consultar,"utf8");
// Recojo el DNI con letra y la contraseña enviados mediante el formulario.
$dni=$_POST["usuario"]; //CAMBIO LA ETIQUETA name DEL DNI POR EL name DE usuario EN LUGAR DE PONER DNI // Hay que introducir como usuario el DNI del cliente y la contraseña inves...
$clave=$_POST["clave"];
//EN LA VARIABLE credenciales ALMACENAMOS LA CONSULTA QUE COMPROBARA SI EXISTE EL USUARIO
$credenciales = "SELECT DNI, Nombre, Nivel FROM Cliente WHERE DNI='$dni' AND Clave='$clave'";
//$credenciales = "SELECT DNI, Nombre, Nivel FROM Cliente WHERE DNI='$dni' AND Clave=MD5('$clave')";
// Ejecuto la consulta para obtener el DNI, nombre y nivel de privilegios.
/*
2 NIVELES:
administrador
usuario
*/
$respuesta = mysqli_query($consultar, $credenciales);
// Si la respuesta de la consulta no está vacía,
// la combinación de usuario y contraseña existe.
if (mysqli_num_rows($respuesta) != 0) {
  // Guardo todos los datos del usuario en una variable.
  $datosUsuario = mysqli_fetch_assoc($respuesta);
  // Pongo un nombre a la sesión.
  session_name("RLogin");
  // Comienzo la sesión.
  session_start();
  // Declaro la variable de sesión que autoriza el acceso al usuario.
  $_SESSION["sesionIniciada"] = true;
  // Declaro la variable de sesión que guarda la fecha y hora de inicio en formato 'aaaa-mm-dd hh:mm:ss'.
  $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
  // Declaro la variable de sesión que almacenará el nivel de privilegios del usuario.
  $_SESSION["datosUsuario"] = array(
    "DNI" => $datosUsuario['DNI'],
    "Nombre" => $datosUsuario['Nombre'],
    "Nivel" => $datosUsuario['Nivel'] );
// Vuelvo a la página de inicio en cuyo menú aparecerán las nuevas secciones y aplicaciones Web.
header ("Location: webmenu.php");
}
else {
  // Si el usuario o contraseña no son válidos,
  // devuelvo un error en la página principal.
  header("Location: login.php?errlog=1");
     }
mysqli_free_result($respuesta);
mysqli_close($consultar); 
?>
