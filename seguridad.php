<?php
// Esta función comprueba que la sesión está iniciada, para
// evitar errores y no intentar iniciarla si ya lo está.
function comprobarSesion() {
  if (php_sapi_name() !== 'cli') {
    if (version_compare(phpversion(), '5.4.0', '>=')) {
      return session_status() === PHP_SESSION_ACTIVE ? "ACTIVA" : "INACTIVA";	}
    else {
      return session_name() === '' ? "INACTIVA" : "ACTIVA";	}  }
  return "INACTIVA";	}
// Asigno un nombre a la sesión.
session_name("RLogin");
// Si no está iniciada, la inicio por primera vez.
if (comprobarSesion() === "INACTIVA") session_start();
// Antes de hacer los cálculos, compruebo que la sesión está iniciada correctamente.
if(isset($_SESSION["sesionIniciada"]) && !empty($_SESSION["sesionIniciada"]) && $_SESSION["sesionIniciada"]) {
  //Calculo el tiempo transcurrido.
  $fechaGuardada = $_SESSION["ultimoAcceso"];
  $ahora = date("Y-n-j H:i:s");
  $tiempoTranscurrido = (strtotime($ahora) - strtotime($fechaGuardada));
   if($tiempoTranscurrido >= 7200) {	 // Comparo el tiempo transcurrido con el límite fijado (2 horas).
    session_destroy(); // Finalizo la sesión.
    header("Location: login.php");	}	// Redirijo a la página de autenticación.
  // Si no ha superado las 2 horas, actualizo el último acceso al momento actual.
  else {
    $_SESSION["ultimoAcceso"] = $ahora;
  }
}
?> 
