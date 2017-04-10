<?php
function generaPass(){
    //Se define una cadena de caractares. RECOMENDAMOS USAR ESTA CADENA DE CARACTERES:
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    //$pass = "";
    $clave = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero podemos poner la longitud que queramos
    $longitudPass=10;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra 
//correspondiente a la posicion $pos en la cadena de caracteres definida.
        //$pass .= substr($cadena,$pos,1);
        $clave .= substr($cadena,$pos,1);
    }
    //return $pass;
    return $clave;
}
//MUESTRA LA CLAVE QUE GENERA ALEATORIAMENTE
//echo generaPass();


