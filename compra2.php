<?php
require_once('parametros.php');
require_once('head.php');
//print_r($_POST);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {    die("Connection failed: " . mysqli_connect_error());   }
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
//SI EL BILLETE ES DE IDA:
//strpos DA la posicion de la cadena ida en relacion con el texto, teniendo 3 valores (ida/vuelta/ida y vuelta)
//DECLARAMOS LAS SIGUIENTES VARIABLES:
$ocupadosida = [];
$ocupadosvuelta = [];
//$trayecto = [];
//$trayecto = $_POST['trayecto'];
//print_r($_POST['trayecto']);
//BILLETE IDA
if (strpos($_POST['trayecto'], 'ida')) {
//SELECCIONAMOS ASIENTOS OCUPADOS DEL BILLETE DE IDA
    $sql = 'SELECT Asiento FROM Billete as b
    JOIN Estacion AS o ON Origen = o.Nombre_estacion
    JOIN Estacion AS d ON Destino = d.Nombre_estacion
    WHERE
    Dia_viaje = "'.$_POST['FECHA'].'" AND 
    o.ID_estacion > d.ID_estacion AND 
    d.ID_estacion <= '.$_POST['EstacionOrigen'].' AND
    o.ID_estacion >= '.$_POST['EstacionDestino'];
//echo $sql;
    $result = mysqli_query($conn, $sql);
    if (!$result) {    die("Falló la consulta: " . mysqli_error($conn));   }
    while ($fila=mysqli_fetch_assoc($result)) { 
     $ocupadosida[] = $fila['Asiento'];
 };
}//cierre llave ida

//BILLETE VUELTA
if (strpos($_POST['trayecto'], 'vuelta')) {
//SELECCIONAMOS ASIENTOS OCUPADOS DEL BILLETE DE IDA
    $sql = 'SELECT Asiento FROM Billete as b
    JOIN Estacion AS o ON Origen = o.Nombre_estacion
    JOIN Estacion AS d ON Destino = d.Nombre_estacion
    WHERE
    Dia_viaje = "'.$_POST['FECHA'].'" AND 
    o.ID_estacion < d.ID_estacion AND
    d.ID_estacion <= '.$_POST['EstacionOrigen'].' AND
    o.ID_estacion >= '.$_POST['EstacionDestino'];
//echo $sql;
    $result = mysqli_query($conn, $sql);
    if (!$result) {    die("Falló la consulta: " . mysqli_error($conn));   }
    while ($fila=mysqli_fetch_assoc($result)) { 
        $ocupadosvuelta[] = $fila['Asiento'];
    };
}//cierre llave VUELTA
$asiento = [];
$ocupadosida[]='1V'; echo '</br>';
$ocupadosida[]='13V'; echo '</br>';
print_r($ocupadosida); echo '</br>';    
echo in_array('1V', $ocupadosida); echo '</br>';
echo in_array($asiento, $ocupadosida); echo '</br>';
print_r($ocupadosvuelta); echo '</br>';
?>
<!-- CREAMOS TABLA PARA SIMULAR EL TREN CON SUS CORRESPONDIENTES ASIENTOS, TANTO VENTANA COMO PASILLO -->
<center><h1>Escoge un asiento del tren de ida</h1></center>
<center><div id="tabla">
    <style>
        #tabla {
            margin-left: 220px;
            margin-top: 1px;
            margin-right: -5px;
        }
    </style>
    <form align="center" action="compra3.php" method="post">
     <?php //Pasamos los datos del formulario de compra.php
    
            foreach($_POST as $clave => $valor)
                echo '<input type="hidden" name="'.$clave.'" value="'.$valor.'"/>';
        ?>
        <table style="width:50%">
            <tr>
                <td rowspan="5">Campo unificado</td>
                <?php
                    for ($i = 0; $i < 5; $i++){
                        $numero = $i*4+1;
                        echo '<td><input type="checkbox" id="miCheck" onclick="myFunction()" name="asiento[]" value="'.$numero.'V" ';
                        if (in_array($numero.'V', $ocupadosida))
                            echo ' checked = "checked" disabled="true"';
                        echo '>'.$numero.'V</td>';
                    }
                 ?>
            </tr>
            <tr>
                   <?php
                    for ($i = 0; $i < 5; $i++){
                        $numero = $i*4+2;
                        echo '<td><input type="checkbox" id="miCheck" onclick="myFunction()" name="asiento[]" value="'.$numero.'P" ';
                        if (in_array($numero.'P', $ocupadosida))
                            echo ' checked = "checked" disabled="true"';
                        echo '>'.$numero.'P</td>';
                    }
                 ?>          
            </tr>
            <tr>
                <td colspan="5">PASILLO</td>            
            </tr>
            <tr>             
                <?php
                    for ($i = 0; $i < 5; $i++){
                        $numero = $i*4+1;
                        echo '<td><input type="checkbox" id="miCheck" onclick="myFunction()" name="asiento[]" value="'.$numero.'P" ';
                        if (in_array($numero.'P', $ocupadosida))
                            echo ' checked = "checked" disabled="true"';
                        echo '>'.$numero.'P</td>';
                    }
                 ?>
            </tr>
            <tr>
                <?php
                    for ($i = 0; $i < 5; $i++){
                        $numero = $i*4+2;
                        echo '<td><input type="checkbox" id="miCheck" onclick="myFunction()" name="asiento[]" value="'.$numero.'V" ';
                        if (in_array($numero.'V', $ocupadosida))
                            echo ' checked = "checked" disabled="true"';
                        echo '>'.$numero.'V</td>';
                    }
                 ?>   
            </tr>

</table></center>
<center><font  size='6px'></br>
    <input type='submit' value='comprar' name='COMPRAR'/> </font></center></br>
</form></div></br>
<script>
//function activarValor (numero) {    checkboxActivados ^= numero;    }
function myFunction() {
    document.getElementById("miCheck").disabled = true;
}
/*function myFunction() {
    document.getElementById("miCheck").disabled = true;
}
*/
</script>
</body>
</html>