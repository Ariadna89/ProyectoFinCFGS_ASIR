<?php require ("seguridad.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="favicon.ico" type="image/ico" />
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <title>Sesi&oacute;n</title>
  </head>

  <body>
    <script type="text/javascript">
      //<![CDATA[
<?php
// Compruebo que la sesión está iniciada y muestro un mensaje de despedida
// en función del estado de la sesión. Finalizo la sesión si está activa
// y si no, abro la página de inicio de sesión.
//A CONTINUACION COMPROBAMOS QUE LA SESION ESTÁ INCIADA Y QUE PUEDE CERRARSE
if (isset($_SESSION["sesionIniciada"]) && $_SESSION["sesionIniciada"]==true) { ?>
      alert("Gracias por su visita.");
<?php $_SESSION["sesionIniciada"] = false; session_destroy(); } ?>
      window.open("index.php", "_self");
//EN JAVASCRIPT EQUIVALE EN PHP AL header("Location: acceso.php") AUTOMATICAMENTE DESPUES DE CERRAR LA SESION ABRE LA PAGINA DE INTRODUZCA SUS DATOS
      //]]>
    </script>
  </body>
</html>
