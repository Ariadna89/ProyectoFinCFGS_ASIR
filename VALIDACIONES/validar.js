//Función permite
			function permite(elEvento, permitidos) {
				var numeros = "0123456789";
				var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ"
				var numeros_caracteres = numeros + caracteres;
				var teclas_especiales = [8, 37, 39, 46];
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
				}
				var evento = elEvento || window.event;
				var codigoCaracter = evento.charCode || evento.keyCode;
				var caracter = String.fromCharCode(codigoCaracter);
				var tecla_especial = false;
				for(var i in teclas_especiales) {
					if(codigoCaracter == teclas_especiales[i]) {
						tecla_especial = true;
						break;
					}
				}
				return permitidos.indexOf(caracter) != -1 || tecla_especial;
			}

//Validar nombre
			function valNombre(){
				var valor = document.getElementById("NOMBRE").value;
				var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
				
				if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
					var textodiv = document.getElementById("name");
					textodiv.innerHTML="Introduzca un nombre";
					textodiv.style.color="red";
					return false;
				}
				else if( valor.length < 3 || valor.length > 20  ) {
					var textodiv = document.getElementById("name");
					textodiv.innerHTML="El tamaño del nombre no es el correcto";
					textodiv.style.color="red";
					return false;
				}
				else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
					var textodiv = document.getElementById("name");
					textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
					textodiv.style.color="red";
					return false;
				}
				for(var i=0;i<valor.length;i++){
					if(valor[i] == " "){
						if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
							var textodiv = document.getElementById("name");
							textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
							textodiv.style.color="red";
							return false;
						}
					}
				}
				var textodiv = document.getElementById("name");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}

//Validar APELLIDO1
			function valApellido(){
				var valor = document.getElementById("APELLIDO1").value;
				var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
				if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="Introduzca sus apellidos";
					textodiv.style.color="red";
					return false;
				}
				else if( valor.length < 4 || valor.length > 20  ) {
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="El tamaño de los apellidos no es el correcto";
					textodiv.style.color="red";
					return false;
				}
				else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
					textodiv.style.color="red";
					return false;
				}
				for(var i=0;i<valor.length;i++){
					if(valor[i] == " "){
						if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
							var textodiv = document.getElementById("lastname");
							textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
							textodiv.style.color="red";
							return false;
						}
					}
				}
				var textodiv = document.getElementById("lastname");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}

//Validar APELLIDO2
			function valApellido(){
				var valor = document.getElementById("APELLIDO2").value;
				var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
				if(valor == null || valor.length == 0 || /^\s+$/.test(valor)){
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="Introduzca sus apellidos";
					textodiv.style.color="red";
					return false;
				}
				else if( valor.length < 4 || valor.length > 20  ) {
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="El tamaño de los apellidos no es el correcto";
					textodiv.style.color="red";
					return false;
				}
				else if( letras_mayusculas.indexOf(valor.charAt(0)) == -1 ) {
					var textodiv = document.getElementById("lastname");
					textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
					textodiv.style.color="red";
					return false;
				}
				for(var i=0;i<valor.length;i++){
					if(valor[i] == " "){
						if( letras_mayusculas.indexOf(valor.charAt(i+1)) == -1 ) {
							var textodiv = document.getElementById("lastname");
							textodiv.innerHTML="Primera letra de cada palabra en mayúscula";
							textodiv.style.color="red";
							return false;
						}
					}
				}
				var textodiv = document.getElementById("lastname");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}

//Validar año de fecha de nacimiento
/*			function Anio(){
				var valor = parseInt(document.getElementById("anio").value);
				var fecha=new Date();
				var ANIO=fecha.getFullYear();
				if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					var textodiv = document.getElementById("Anio");
					textodiv.innerHTML="Ingrese un año";
					textodiv.style.color="red";
					return false;
				}
				if (!(/^\d{4}$/.test(valor))) {
					var textodiv= document.getElementById("Anio");
					textodiv.innerHTML="El numero debe de tener 4 digitos";
					textodiv.style.color="red";
					return false;
				}
				if (valor < 1900 || valor > (ANIO - 18)){
					var textodiv= document.getElementById("Anio");
					textodiv.innerHTML="Introduzca un año válido desde 1900 o es usted menor de edad";
					textodiv.style.color="red";
					return false;
				}
				var textodiv = document.getElementById("Anio");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}
*/			

//Validar DNI
			function valDni(){
				var valor = document.getElementById("DNI").value;
				var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
				
				if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					var textodiv= document.getElementById("identificacion");
					textodiv.innerHTML="Introduzca su DNI";
					textodiv.style.color="red";
					return false;
				}
				
				if( !(/^\d{8}[A-Z]$/.test(valor)) || valor.charAt(8) != letras[(valor.substring(0, 8))%23]) {
					var textodiv= document.getElementById("identificacion");
					textodiv.innerHTML="Introduzca su DNI correctamente";
					textodiv.style.color="red";
					return false;
				}
				
				var textodiv = document.getElementById("identificacion");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}

//Validar direccion
			function valDireccion() {
				var valor = document.getElementById("DIRECCION").value;
				
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					var textodiv = document.getElementById("DIRECCION");
					textodiv.innerHTML="Introduzca su dirección";
					textodiv.style.color="red";
					return false;
				}
				
				var textodiv = document.getElementById("DIRECCION");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}

//Validar telefono
			function Telefono(){
				var valor=document.getElementById("TELEFONO").value;
				var x=valor.split("");
				if( isNaN(valor) || valor == null || valor.length == (0) || /^\s+$/.test(valor) ) {
					var textodiv= document.getElementById("TELEFONO");
					textodiv.innerHTML="Introduzca su número de teléfono";
					textodiv.style.color="red";
					return false;
				}
				if (!(/^\d{9}$/.test(valor))) {
					var textodiv= document.getElementById("TELEFONO");
					textodiv.innerHTML="El numero debe de tener 9 digitos";
					textodiv.style.color="red";
					return false;
				}
				if (x[0] != 6 && x[0] != 7 && x[0] != 9){
					var textodiv= document.getElementById("TELEFONO");
					textodiv.innerHTML="El número debe empezar por 6,7 o 9";
					textodiv.style.color="red";
					return false;
				}
				var textodiv = document.getElementById("TELEFONO");
				textodiv.innerHTML="Ok";
				textodiv.style.color="green";
					
				return true;
			}
