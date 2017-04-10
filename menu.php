<center>
  <img  src="imagenes/cabecera.jpg" width="25%" height="25%"> 
</center></br>
<center>
  <div align="center">
    <ul>
      <li><a class="active" href="#">&nbsp;----&nbsp;</a></li>
      <li><a href="#">&nbsp;----&nbsp;</a></li>
      <li><a href="#">&nbsp;----&nbsp;</a></li>
      <li><a href="#">&nbsp;----&nbsp;</a></li>
      <li><a href="#">&nbsp;----&nbsp;</a></li>
      <li><a href="#">&nbsp;----&nbsp;</a></li>
      <?php
      if(isset($_SESSION["sesionIniciada"]) && !empty($_SESSION["sesionIniciada"])) {
        if ($_SESSION["datosUsuario"]['Nivel'] == 1) {echo '<li><a href="servicios.php">Servicios</a></li>
          <li><a href="horarios.php">Horarios</a></li>
        <li class="bajada">
          <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Billete</a>
          <div class="dropdown-content" id="myDropdown">
            <a href="compra1.php">Compra Billete</a>
            <a href="modificar.php">Modificar Billete</a>
            <a href="eliminar.php">Anular Billete</a>
          </div>
        </li>
        ';}
        else {echo '<li><a href="clientes.php">Clientes</a></li>
          <li><a href="estadistica.php">Estadística</a></li>
        <li><a href="recaudacion.php">Recaudación</a></li>	';}	}	
        ?>
        <li><a href="#">&nbsp;----&nbsp;</a></li>
        
        <?php if(isset($_SESSION["sesionIniciada"]) && !empty($_SESSION["sesionIniciada"])) {
          echo '	  
          <li><a href="salir.php">Cerrar sesi&oacute;n</a></li>
          <ul>
            <li><a class="active" href="#">&nbsp;----&nbsp;</a></li>
            <li><a href="#">&nbsp;----&nbsp;</a></li>
            <li><a href="#">&nbsp;----&nbsp;</a></li>
            <li><a href="#">&nbsp;----&nbsp;</a></li>
            <li><a href="#">&nbsp;----&nbsp;</a></li>

            ';	}
            else {  echo '<li><a href="login.php">Iniciar sesi&oacute;n</a></li>';		}	?>
          </ul></div></center>
          <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");	}
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');      }	    }	  }	}
      </script>
