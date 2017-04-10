function validar() {
	NOMBRE=document.getElementById('NOMBRE');
	APELLIDO1=document.getElementById('APELLIDO1');
	APELLIDO2=document.getElementById('APELLIDO2');
	TELEFONO=document.getElementById('TELEFONO');
	EDAD=document.getElementById('EDAD');
	//correo=document.getElementById('correo');
	// Selecciona las etiquetas y las OCULTA. Cuando algo no esté bien saldrá la etiqueta de error (display: inline)
	sp_NOMBRE=document.getElementById('error_'+NOMBRE.id);
	sp_NOMBRE.setAttribute('style','display: none');
	sp_APELLIDO1=document.getElementById('error_'+APELLIDO1.id);
	sp_APELLIDO1.setAttribute('style','display: none');
	sp_APELLIDO2=document.getElementById('error_'+APELLIDO2.id);
	sp_APELLIDO2.setAttribute('style','display: none');
	sp_TELEFONO=document.getElementById('error_'+TELEFONO.id);
	sp_TELEFONO.setAttribute('style','display: none');
	sp_EDAD=document.getElementById('error_'+EDAD.id);
	sp_EDAD.setAttribute('style','display: none');

	//sp_correo=document.getElementById('error_'+correo.id);
	//sp_correo.setAttribute('style','display: none');
	// Creo la variable booleano "continuar" como valor verdadero. Si lago está mal el valor del booleano será falso y mostrará la etiqueta 	de error
	continuar = true
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(NOMBRE.value)){
	}
	else{
		sp_NOMBRE.innerHTML="Por favor escriba el nombre";
		sp_NOMBRE.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/.test(APELLIDO1.value)){
	}
	else{
		sp_APELLIDO1.innerHTML="Por favor escriba el primer apellido";
		sp_APELLIDO1.setAttribute('style','display: inline');
		continuar = false;
	}
	else{
		sp_APELLIDO2.innerHTML="Por favor escriba el segundo apellido";
		sp_APELLIDO2.setAttribute('style','display: inline');
		continuar = false;
	}
/*
	if(/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(correo.value)){
	}
*/
	if(/^([0-9])+$/.test(TELEFONO.value)){
	}
	else{
		sp_TELEFONO.innerHTML="Por favor escriba el numero de telefono";
		sp_TELEFONO.setAttribute('style','display: inline');
		continuar = false;
	}
	if(/^([0-9])+$/.test(EDAD.value)){
	}
	else{
		sp_EDAD.innerHTML="Por favor escriba su edad";
		sp_EDAD.setAttribute('style','display: inline');
		continuar = false;
	}

	
        /*
        else{
		sp_correo.innerHTML="Por favor pon su email correcto";
		sp_correo.setAttribute('style','display: inline');
		continuar = false;
	}
        */
// Llamo a continuar y si continuar = verdadero los datos son correctos y si continuar = falso no se enviará y mostrará el Error
return continuar;
}


//DNI

/*

window.onload = function() {

function permitido(elEvento, permitidos) {
  var numeros = "0123456789";
  var caracteres = " ,abcçdefghijklmnñopqrstuvwxyzABCÇDEFGHIJKLMNÑOPQRSTUVWXYZáàâäãéèêëíìîïóòôöõúùûüÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜºª";
  var numeros_caracteres = numeros + caracteres;
  var ninguncar = "​";
  var teclas_especiales = [8, 9, 37, 39, 46];
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
    case 'ninguno':
      permitidos = ninguncar;
      break;
  }
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
  var tecla_especial = false;
  for (var i in teclas_especiales) {
    if (codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
    }
  }
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

function formatearDNI(num) {
  var letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T'];
  var dni = num.toString();
  var carac = dni.split("");
  for (var i=carac.length; i<8; i++) carac.unshift('0');
  var plantilla = [carac[0],carac[1],'.',carac[2],carac[3],carac[4],'.',carac[5],carac[6],carac[7],'-',letras[num%23]];
  dni=plantilla.join("");
  return dni;
}

function completarDNISinFormato(num) {
  var letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T'];
  var dni = num.toString();
  var carac = dni.split("");
  for (var i=carac.length; i<8; i++) carac.unshift('0');
  var plantilla = [carac[0],carac[1],carac[2],carac[3],carac[4],carac[5],carac[6],carac[7],letras[num%23]];
  dni=plantilla.join("");
  return dni;
}

var todoCorrecto = false;

function validarNombre(cadena) {
  var vnom = document.getElementById("vnombre");
  var palabras = cadena.split(" ");
  var correcto = true;
  for (var i=0; i<palabras.length; i++) {
    if (palabras[i] != "de" && palabras[i] != "del" && palabras[i] != "la" && palabras[i] != "los" && palabras[i] != "las" && palabras[i] != "y") {
      if (!/^[A-ZÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÑ]([a-záàâäãéèêëíìîïóòôöõúùûüñ]+)$/.test(palabras[i])) correcto = false;
    } // Así acepto nombres como "María del Carmen" o "María de las Mercedes", en casos muy extraños.
  }
  if (!correcto) {
    vnom.innerHTML = "El nombre no est&aacute; escrito correctamente."
    vnom.style.color = "red";
    todoCorrecto = false;
  }
  else {
    vnom.innerHTML = "Correcto."
    vnom.style.color = "green";
	todoCorrecto = true;
  }
}

function validarApellidos(cadena) {
  var vapell = document.getElementById("vapellidos");
  var palabras = cadena.split(" ");
  var correcto = true;
  for (var i=0; i<palabras.length; i++) {
    if (palabras[i] != "de" && palabras[i] != "del" && palabras[i] != "la" && palabras[i] != "los" && palabras[i] != "las" && palabras[i] != "y") {
      if (!/^[A-ZÁÉÍÓÚÑ]([a-záéíóúñ]+)$/.test(palabras[i])) correcto = false;
    } // Así acepto apellidos como "de Todos los Santos" o "Ramón y Cajal".
  }
  if (!correcto) {
    vapell.innerHTML = "Los apellidos no est&aacute;n escritos correctamente."
    vapell.style.color = "red";
    todoCorrecto = todoCorrecto && false;
  }
  else {
    vapell.innerHTML = "Correcto."
    vapell.style.color = "green";
	todoCorrecto = todoCorrecto && true;
  }
}

function validarSexo() {
  var vsexo = document.getElementById("vsexo");
  var elementos = document.getElementsByName("sexo");
  var ninguno = true;
  for(var i=0; i<elementos.length; i++) {
    if(elementos[i].checked) ninguno = false;
  }
  if (ninguno) {
    vsexo.innerHTML = "Es obligatorio seleccionar su sexo."
    vsexo.style.color = "red";
    todoCorrecto = todoCorrecto && false;
  }
  else {
    vsexo.innerHTML = "Correcto."
    vsexo.style.color = "green";
    todoCorrecto = todoCorrecto && true;
  }
}

function validarDNI(cadena) {
  var vdni = document.getElementById("vdni");
  
  if (!/^\d{1,8}$/.test(cadena)) {
    vdni.innerHTML = "El valor introducido no es un n&uacutemero."
    vdni.style.color = "red";
    todoCorrecto = todoCorrecto && false;
  }
  else {
    vdni.innerHTML = "Correcto. DNI completo: " + formatearDNI(parseInt(cadena)) + ".";
    vdni.style.color = "green";
	todoCorrecto = todoCorrecto && true;
  }
}

function validarDomicilio(cadena) {
  var vdomic = document.getElementById("vdomicilio");
  if (cadena == null || cadena.length == 0 || /^\s+$/.test(cadena)) {
    vdomic.innerHTML = "El domicilio no es correcto."
    vdomic.style.color = "red";
    todoCorrecto = todoCorrecto && false;
  }
  else {
    vdomic.innerHTML = "Correcto."
    vdomic.style.color = "green";
	todoCorrecto = todoCorrecto && true;
  }
}

function validacion() {
  vformulario = document.getElementById("vform");

  validarNombre(document.getElementById("nombre").value);
  validarApellidos(document.getElementById("apellidos").value);
  validarSexo();
  validarDNI(document.getElementById("dni").value);
  validarDomicilio(document.getElementById("domicilio").value);

  if (!todoCorrecto) {
    vformulario.innerHTML = "Hay datos err&oacute;neos. Revise los campos y corr&iacute;jalos."
    vformulario.style.color = "red";
  }
  else {
    vformulario.innerHTML = "Enviando formulario..."
    document.getElementById('dni').value = completarDNISinFormato(parseInt(document.getElementById('dni').value));
    vformulario.style.color = "green";
  }
  return todoCorrecto;
}

*/
