<?php
//COMPROBAR SI EL USUARIO HA RELLENADO CAMPO DE FORMULARIO
//SUPONIENDO QUE EL FORMULARIO CONTENGA EL CAMPO NOMBRE Y CONSEGUIR QUE NO SUPERE EL MÁXIMO DE CARACTERES PERMITIDOS (STRLEN)
//ELIMINA ESPACIOS EN BLANCO Y A CONTINUACION EL VALOR (TRIM)
$NOMBRE=trim($_POST['NOMBRE']);
if (strlen($NOMBRE) <=20)	
		{
		echo "Su nombre es: ".$NOMBRE";
		}
else
	{
	echo "El nombre contiene más de 20 caracteres";
	}

//SUPONIENDO QUE EL FORMULARIO CONTENGA EL CAMPO APELLIDO1
if (trim($_POST['APELLIDO1'])!='')	
		{
		echo "Su primer apellido es ".trim($_POST['APELLIDO1']);
		}
else
	{
	echo "El primer apellido no se ha introducido";
	}

//SUPONIENDO QUE EL FORMULARIO CONTENGA EL CAMPO APELLIDO2
if (trim($_POST['APELLIDO2'])!='')	
		{
		echo "Su primer apellido es ".trim($_POST['APELLIDO2']);
		}
else]
	{
	echo "El segundo apellido no se ha introducido";
	}

//SUPONIENDO QUE EL FORMULARIO CONTENGA UN ÁREA PASSWORD
$pass=$_POST['pass'];
if (!preg_match('`^[[:alnum:]]{4,8}$`',$pass))	
		{
			echo "La contraseña no es válida";
		}

//SUPONIENDO QUE EL FORMULARIO CONTENGA UNA ZONA TELÉFONO
$TELEFONO=$_POST['TELEFONO'];
if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){4}$#", $TELEFONO))	
		{
			echo "El número es válido";
		}
else
		{
			echo "El número no es válido";
		}
?>