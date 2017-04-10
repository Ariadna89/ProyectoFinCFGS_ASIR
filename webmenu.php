<?php 
require ("seguridad.php");
require_once('head.php');
include ("menu.php"); 
echo '<br><br>';

if(isset($_SESSION["datosUsuario"]) && !empty($_SESSION["datosUsuario"])) echo "<b>Bienvenido/a, " . $_SESSION["datosUsuario"]["Nombre"] . "</b>"; ?>
<h3>RiderWheels</h3>

<p>Empresa dedicada al transporte de una sola línea entre Madrid y Ciudad Real.</p>
<center>
<div class="transp-block">
    <img class="transparent" src="imagenes/principal.jpg" alt="" width="1000 px" height="600 px" />
</div>
</center>
<!--   
<img align="center" src="imagenes/principal.jpg" width="90%" height="40%">  -->
<!--font-family: Comic Sans MS, Lucida Calligraphy, Broadway, Book Antiqua, Baskerville Old Face, Arial Black, Bookman Old Style, Bradley Hand ITC;    -->
<!--
s:
font-family: Arial, Helvetica, sans-serif;
font-family: "Times New Roman", Times, serif;
font-family: "Courier New", Courier, monospace;
font-family: Georgia, "Times New Roman", Times, serif;
font-family: Verdana, Arial, Helvetica, sans-serif;    
-->

</body>
</html>
