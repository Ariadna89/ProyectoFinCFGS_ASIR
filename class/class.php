<?php
class Conectar //DONDE NOS CONECTAMOS A LA BASE DE DATOS, SERVIDOR, BASE DE DATOS, CLAVE, USUARIO

{
public static function con() 
{

$con =mysqli_connect("localhost", "root", "inves");
mysqli_query("SET NAMES 'utf8'");
mysqli_select_db("Renfe");
return $con;				

}

}

class Reporte //DONDE ALMACENAREMOS LAS VENTAS
{
private $ventas;
public function __construct()
{
	$this->ventas = array();
}
public function get_ventas()
{
	$sql = "select Origen, Tipo_descuento from Billetes";
	$res = mysqli_query($sql, Conectar::con());
	while ($reg = mysqli_fetch_assoc($res))
			{
				$this->ventas[] = $reg;
			}
return $this->ventas;

}
}

?>