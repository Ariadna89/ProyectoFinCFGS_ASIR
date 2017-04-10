<?php
//LLAMAMOS A DOS LIBRERÍAS:
require_once("jpgraph/src/jpgraph.php"); //LIBRERÍA EN GENERAL
require_once("jpgraph/src/jpgraph_bar.php");//QUE TIPO DE GRÁFICO VAMOS A EMPLEAR, EN ESTE CASO, UN GRÁFICO DE BARRAS

require_once("class/class.php");
$objReporte = new Reporte();//CREO INSTANCIA REPORTE QUE SE LLAMA $objReporte
$reg_ventas = $objReporte -> get_ventas();//CREO VARIABLE $reg_ventas PARA ALMACENAR TODOS LOS REGISTROS QUE TENGO

$datos = array();// CREO VARIABLE DATOS

$total = count($reg_ventas);//TOTAL DE REGISTROS QUE TIENE ESTE ARREGLO 

for ($i = 0; $i < $total; $i++) // CAPTURAMOS LOS DATOS DESDE $i= 0 hasta el total ($total)
		{
			$datos[] = $reg_ventas[$i]["Tipo_descuento"];//monto es el nombre de la columna de la tabla que quiero sacar
		}

$grafico = new Graph(500, 400, "auto");//GRAFICO QUE QUIERO SACAR, 500 ES DE LARGO Y 40O DE ANCHO Y SE CREA AUTOMATICAMENTE REDIMENSIONAR
$grafico->SetScale("textlin");//VIENE EN LA DOCUMENTACION
$grafico->title->Set("Reporte de venta de billetes");
$grafico->xaxis->title->Set("Origen");//PARTE DE X = ABCISAS MESES
$grafico->yaxis->title->Set("Tipo_descuento");//PARTE Y
$barplot1 = new BarPlot ($datos);//$barplot1 LE PASARA LOS DATOS
$barplot1->SetColor("#EFEFEF@0.5");//COLOR A LAS BARRAS
//UN GRADIENTE HORIZONTAL DE ROJO A AZUL -- COLOR QUE SE DEGRADA
$barplot1->SetFillGradient('#EFEFEF@O','#F9BB64@0.5', GRAD_HOR);
//25 PÍXELES DE ANCHO PARA CADA BARRA
$barplot1->SetWidth(25);//ANCHO DE CADA BARRA 25
$grafico->Add($barplot1);
$grafico->Stroke();//NOS PERMITE VER EL GRÁFICO
?>