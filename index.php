<?php
require ("seguridad.php"); 
require_once('parametros.php');
require_once('head.php');
?>
<fieldset style="margin:auto"> <!-- AGRUPA LOS CAMPOS DEL FORMULARIO -->
<legend>FORMULARIO REGISTRO</legend>
<div align="center">
<form action="formulario.php" method="post">
<input type="submit" value="Regístrate" name="submit" id="submit"></div></form></br>
</fieldset>
</br>

<fieldset style="margin:auto">
<!-- AGRUPA LOS CAMPOS DEL FORMULARIO -->
<!-- <button type="submit">Iniciar sesión</button> -->
<div align="center">
<form action="login.php" method="post">
<input type="submit" value="Iniciar sesión" name="submit" id="submit"></div></form>
    <legend>ACCESO A RENFE MEDIANTE CREDENCIALES</legend>
      </fieldset>

<script>

</script>
</body>
</html>
