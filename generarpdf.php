<?php
/*
LA EXTENŚIÓN PDF DE PHP PERMITE GENERAR DOCUMENTOS PDF
ESTA EXTENSION UTILIZA LA BILIOTECA PDFlib QUE NECESITA UNA LICENCIA (http://www.pdflib.com/products/pdflib-family)
EXISTEN VARIAS ALTERNATIVAS GRATUITAS PARA GENERAR DOCUMENTOS PDF, ENTRE LAS QUE SE ENCUENTRA FPDF (http://www.fpdf.org/)
ESTA BIBLIOTECA NO VIENE INSTALADA DE MANERA PREDETERMINADA CON PHP, PERO ESTÁ PRESENTE EN EL PAQUETE XAMPP
*/
// conectamos con MySQL
$servername = "localhost";
$username = "root";
$password = "inves";
$dbname = "Renfe";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión 
if (!$conn) 
   {die("Connection failed: " . mysqli_connect_error());}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
  mysqli_set_charset($conn,"utf8");

//INCLUISION DE LA BIBLIOTECA
//require('FPDF/fpdf.php');
include ('FPDF/fpdf.php');
//include ('fpdf.php');
//SELECCIONAR LOS DATOS EN LA BASE DE DATOS
//ESTA LINEA VA FUERA: set_magic_quotes_runtime(0);
// conectamos con MySQL
$servername = "localhost";
$username = "root";
$password = "inves";
$dbname = "Renfe";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión 
if (!$conn) 
   {die("Connection failed: " . mysqli_connect_error());}
// Cambio la codificación de caracteres por defecto para visualizar correctamente los datos en la página.
mysqli_set_charset($conn,"utf8");
$sql = 'select Cliente.DNI, Tipo_descuento, Asiento, Precio_fin, Caducidad, Origen, Destino, Dia_ida, Billete.Hora_salida, Billete.Hora_llegada  from Cliente join Compra on  Cliente.DNI=Compra.DNI join Billete join Trayecto_pasapor on Billete.ID_billete=Trayecto_pasapor.ID_billete join Tren on Trayecto_pasapor.ID_tren=Tren.ID_tren GROUP BY DNI DESC limit 1;';

//select Cliente.DNI, Nombre, Apellido1, Apellido2, Tipo_descuento, Asiento, Precio_fin, Caducidad, Origen, Destino, Dia_ida, Billete.Hora_salida, Billete.Hora_llegada  from Cliente join Compra on  Cliente.DNI=Compra.DNI join Billete join Trayecto_pasapor on Billete.ID_billete=Trayecto_pasapor.ID_billete join Tren on Trayecto_pasapor.ID_tren=Tren.ID_tren GROUP BY DNI DESC limit 1;

$ok = ($consulta = mysqli_prepare ($conn, $sql));
	if ($ok) {	$ok = @mysqli_stmt_execute ($consulta);	}
	if ($ok) {	$ok = @mysqli_stmt_bind_result ($consulta, $DNI, $Tipo_descuento, $Asiento, $Precio_fin, $Caducidad, $Origen, $Destino, $Dia_ida, $Hora_salida, $Hora_llegada);	}
	if (! $ok) {	
					exit ('Error en la seleccion de datos de la base de datos');	
				}
//CREAR UN NUEVO DOCUMENTO PDF = new FPDF()	
//1º PARÁMETRO = ORIENTACION
// > P = VERTICAL - L = HORIZONTAL
//2º PARÁMETRO = UNIDAD DE MEDIDA
// > PT = PUNTO - mm= milímetros - cm = centímetros
//3º PARÁMETRO = FORMAT (A3, A4, A5, etc)
//TODOS LOS PARÁMETROS SON OPCIONALES. PREDETERMINADOS: P, mm, A4
$pdf = new FPDF('L', 'mm', 'A3');

//DEFINIR LOS SALTOS DE PÁGINA AUTOMÁTICOS = SetAutoPageBreak()
//1º PARÁMETRO = AUTOMÁTICO (TRUE/FALSE)
// > P = VERTICAL - L = HORIZONTAL
//2º PARÁMETRO = MARGEN
// > DISTANCIA CON RELACION AL LÍMITE INFERIOR DE LA PÁGINA QUE PROVOCA EL SALTO (2 cm DE MANERA PREDETERMINADA, SI ESTÁ ACTIVO)
$pdf->SetAutoPageBreak(false);

//CREAR UNA NUEVA PÁGINA EN EL DOCUMENTO = AddPage()
//1º PARÁMETRO = ORIENTACION
// > P = VERTICAL - L = HORIZONTAL
$pdf->AddPage();

//DEFINIR LOS DATOS DE RESUMEN DEL DOCUMENTO = SetTitle(), SetAuthor(), SetSubjetc()
$pdf->SetTitle('Clientes de la Red Ferroviaria RENFE');
$pdf->SetAuthor('Ariadna');
$pdf->SetSubject('Clientes');

//ESTABLECER LA FUENTE = SetFont()
//1º PARÁMETRO = FAMILIA (COURIER, HELVÉTICA, ARIAL, TIMES) 
//O DE UN NOMBRE DEFINIDO POR AddFont()
//2ºPARÁMETRO OPCIONAL = STYLE (B = NEGRITA, I = CURSIVA, U = SUBRAYADO)
//3º PARÁMETRO OPCIONAL = TAMAÑO EN PUNTOS SetFontSize()
$pdf->SetFont('Arial', 'B', 20);

//ESCRIBIR TEXTO A PARTIR DE LA POSICION ACTUAL = Write()
//1ºPARÁMETRO = ALTURA DE LA LÍNEA
//2ºPARÁMETRO = TEXTO QUE DEBE ESCRIBIRSE
//UTILIZA LAS CARACTERÍSTICAS ACTUALES DE FUENTE, COLORES, ETC...
//EL SALTO DE LÍNEA ES AUTOMÁTICO CUANDO EL MARGEN DERECHO SE ALCANZA (O SE ECUENTRA EN EL CARÁCTER \n)
$pdf->Write(4,'Clientes de la Red Ferroviaria RENFE');

//REALIZAR UN SALTO DE LÍNEA = Ln()
//1º PARÁMETRO OPCIONAL = ALTURA DE LA LÍNEA, LA ABCISA VUELVE AL VALOR DEL MARGEN IZQUIERDO
$pdf->Ln(40);

//CAMBIAR EL TAMAÑO DE FUENTE = SetFontSize()
//1ºPARÁMETRO TAMAÓ EN PUNTOS
$pdf->SetFontSize(12);

//ESTABLECER EL COLOR DEL TEXTO = SetTextColor()
//UN SOLO PARÁMETRO = NIVEL GRIS ENTRE (0-255)
//3 PARÁMETROS = COMPONENTES RGB ([0-255],[0-255],[0-255]) = (1,2,3)
$pdf->SetTextColor(255,0,0); //ROJO

//ESTABLECER EL COLOR DE FONDO = SetFillColor()
//UN SOLO PARÁMETRO = NIVEL GRIS ENTRE (0-255)
//3 PARÁMETROS = COMPONENTES RGB ([0-255],[0-255],[0-255]) = (1,2,3)
$pdf->SetFillColor(255,255,140); //AMARILLO CLARO

//ESCRIBIR UNA CELDA = Cell()
//1º PARÁMETRO = ANCHURA (0 = HASTA EL MARGEN DERECHO)
//2º PARÁMETRO = ALTURA 
//3º PARÁMETRO = TEXTO QUE DEBE ESCRIBIRSE
//4º PARÁMETRO = BORDE // > NÚMERO = 0 = NINGUN BORDE - 1 = MARCO // > CADENA = COMBINACION DE L (IZQUIERDA), T (SUPERIOR), R (DERECHA), B(INFERIOR)
//5º PARÁMETRO = POSICION AL FINAL // > 0 = A LA DERECHA - 1 = AL PRINCIPIO LÍNEA SIGUIENTE - 2 = POR DEBAJO
//6º PARÁMETRO = ALINEACION // > L o CADENA VACÍA = IZQUIERDA -C = CENTRADO -R = DERECHA
//7º PARÁMETRO = RELLENO // > 0 = no - 1 = sí //SOLO ES OBLIGATORIO EL PRIMER PARÁMETRO
//$DNI, $Nombre, $Apellido1, $Apellido2, $Edad, $Tipo_descuento, $Asiento, $Precio_fin, $Caducidad, $Origen, $Destino, $Dia_salida, $Hora_salida, $Hora_llegada
$pdf->Cell(40,7,'DNI',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Tipo de descuento',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Asiento',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Precio fin',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Caducidad',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Origen',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Destino',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Dia ida',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Hora salida',1,0,'C',1); //TÍTULO DE LA COLUMNA
$pdf->Cell(40,7,'Hora llegada',1,1,'C',1); //TÍTULO DE LA COLUMNA

//CAMBIAR DE COLOR Y DE FUENTE
$pdf->SetFont('Arial','',12); //'' = NORMAL
$pdf->SetTextColor(0,0,0); //NEGRO

//EN UN BUCLE ESCRIBIR LOS DATOS DE LA MATRIZ
while (mysqli_stmt_fetch($consulta)) { // FETCH DE LA CONSULTA
$Precio_fin = number_format ($Precio_fin,2,',',' ');
//$DNI, $Nombre, $Apellido1, $Apellido2, $Edad, $Tipo_descuento, $Asiento, $Precio_fin, $Caducidad, $Origen, $Destino, $Dia_salida, $Hora_salida, $Hora_llegada
$pdf->Cell(40,7,$DNI,1,0,'C');
$pdf->Cell(40,7,$Tipo_descuento,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Asiento,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Precio_fin,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Caducidad,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Origen,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Destino,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Dia_ida,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Hora_salida,1,0,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
$pdf->Cell(40,7,$Hora_llegada,1,1,'C'); //FILA SIGUIENTE, MÁS A LA DERECHA
}

//COLOCARSE EN UN LUGAR PRECISO EN LA PÁGINA = SetXY()
//1º PARÁMETRO = X = ABCISAS
//2º PARÁMETRO = Y = ORDENADA
//EL ORIGEN ES LA ESQUINA SUPERIOR IZQUIERDA
//SI LOS VALORES SON NEGATIVOS, EL ORIGEN ES LA ESQUINA INFERIOR DERECHA
$pdf->SetXY(5,-5); //1 cm a la izquierda, 1 cm DESDE LA PARTE INFERIOR

//VISUALIZAR EL NÚMERO DE PÁGINA = PageNo()
$pdf->SetFontSize(20);
$pdf->Cell(0,0,'Página '.$pdf->PageNo(),0,0,'R');

//MOSTRAR UNA IMAGEN = Image()
//1º PARÁMETRO = NOMBRE DE LA IMAGEN
//2º PARÁMETRO = ABCISA DE LA ESQUINA SUPERIOR IZQUIERDA
//3º PARÁMETRO = COORDENADA DE LA ESQUINA SUPERIOR IZQUIERDA
//4º PARÁMETRO OPCIONAL = ANCHURA DE LA IMAGEN
// > 0 o AUSENTE = CALCULA AUTOMÁTICAMENTE
//5º PARÁMETRO OPCIONAL = ALTURA DE LA IMAGEN
// > 0 o AUSENTE = CALCULA AUTOMÁTICAMENTE
//6º PARÁMETRO OPCIONAL = TIPO (JPEG, JPG, PNG)
//$pdf->Image('logo.jpg',10,285,20);

//ESTABLECER EL COLOR PARA EL DIBUJO = SetDrawColor()
//UN SOLO PARÁMETRO = NIVEL GRIS ENTRE (0-255)
//3 PARÁMETROS = COMPONENTES RGB ([0-255],[0-255],[0-255]) = (1,2,3)
$pdf->SetDrawColor(128); //NIVEL DE GRIS
$pdf->line(10,15,200,15); //LÍNEA HORIZONTAL SUPERIOR
$pdf->line(10,285-2,200,285-2); //LÍNEA HORIZONTAL INFERIOR

//ENVIAR EL DOCUMENTO A UN DESTINO = Output()
//1º PARÁMETRO OPCIONAL = NOMBRE ARCHIVO
//2º PARÁMETRO OPCIONAL = TIPO DESTINO
// > F = ARCHIVO EN EL SERVIDOR
// > I = EXPLORADOR EN LINEA
// > D = EXPLORADOR DESCARGA
//SI NINGUN PARÁMETRO: DESTINO = I
//SI SE ESPECIFICA UN NOMBRE: DESTINO PREDETERMINADO = F
//$pdf->Output(); //EXPLORADOR EN LÍNEA
$pdf->Output("I","mipdf.pdf"); //EXPLORADOR EN LÍNEA

////NO FUNCIONAAAAAAAAAAAAAAAAAAAAAAAAAAAA
//CARACTERES ACENTUADOS
//$str = utf8_decode($str);
//$str = ISO-8859-1_decode($str);
//$str = windows-1252_decode($str);
//$str = ISO-8859-1
//$str = windows-1252
//$str = utf8_decode($str);

//$str = iconv('UTF-8', 'windows-1252', $str);
//pARA QUE VISUALICE CORRECTAMENTE EL SÍMBOLO DEL EURO:
//$str = iconv('UTF-8', 'windows-1252', $str);
//$str = iconv('UTF-8', 'ISO-8859-1', $str);


//ABRIR UN PDF EN UNA PESTAÑA NUEVA


?>