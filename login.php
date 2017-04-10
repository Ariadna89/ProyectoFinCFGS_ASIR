<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="shortcut icon" href="favicon.ico" type="image/ico" />
  <link href="css/css.css" rel="stylesheet" type="text/css" />
  <title>Inicio de Sesi&oacute;n</title>
  <style type="text/css" media="all">
    table, th, tr, td {
      border: 0px;
      text-align: center;
      width: 300px;
      border-spacing: 2px;
      border-collapse: separate;
      padding: 2px;
    }
    .cell01 {
      text-align: center;
      <?php
/*
CODIGO PHP QUE MODIFICA EL CSS DE ARRIBA:
AQUI SI HAY UN ERROR COMPARA SI NO SON CORRECTOS LOS DATOS // SON DATOS INCORRECTOS (1) O UN ERROR (DESC) DESCONOCIDO
Y EL FONDO DEL INTRODUCE TUS DATOS LO COLOREA EN ROJO Y SI NO EN GRIS Y EL PRIMER IF QUE VA CON EL SEGUNDO ELSE SI NO PONE NINGUNO DE LOS ANTERIORES TAMBIEN EN GRIS
*/
if(isset($_GET["errlog"])) {
  if ($_GET["errlog"]=="1" || $_GET["errlog"]=="desc") {

    echo '  background-color: red;
    color: white;
    '; }
    else {
      echo '  background-color: #CCC;
      ';

    }

  }

  else {
    echo '  background-color: #CCC;
    ';

  }

  ?>}
  /*cellxx= celdaxx*/
  .cell02 { 
    text-align: right;
    width: 100%;
  }
  .cell03 {
    text-align: center;
  }
  code {
    float: left;
  }
</style>
</head>
<body>
</br></br></br></br>
<div align="center" id="contenedor">
  <div id="contenido">
    <!-- A CONTINUACION COMPRUEBA SI NO HA INICIADO LA SESION -->
    <?php if (!isset($_SESSION["sesionIniciada"]) || !isset($_SESSION["datosUsuario"])) { ?>
    <h3>Iniciar sesi&oacute;n</h3>
  </br><form action="./control.php" method="post">
  <table>
    <tr>
      <td class="cell01" colspan="2"><?php if(isset($_GET["errlog"])) {
        if ($_GET["errlog"]=="1") {
          echo '<b>Datos incorrectos</b><br />';
        }
        if ($_GET["errlog"]=="desc") {
          echo '<b>Error desconocido</b><br />';
        }
        else {
          echo 'Introduce tus datos';
        }
      }
      else {
        echo 'Introduce tus datos';
      }
      ?>
    </td>
  </tr>
  <tr>
    <td class="cell02">DNI:</td><!--CAMBIO LA ETIQUETA name DEL DNI POR EL name DE usuario EN LUGAR DE PONER DNI-->
    <td><input type="text" id="usuario" name="usuario" size="8" maxlength="10" /></td>
  </tr>
  <tr>
    <td class="cell02">Contrase&ntilde;a:</td>
    <td><input type="password" id="clave" name="clave" size="10" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="cell03" colspan="2"><input type="submit" value="ENVIAR" /></td>
  </tr>
</table>
</form><br />
<!-- SI LA SESION ESTA INICIADA SE MUESTRA EL SIGUIENTE MENSAJE H3 -->
<?php }
else {
  echo "
  <h3>La sesi&oacute;n ya ha sido iniciada.</h3>";
} ?>
</div>
</div>
</body>
</html>
