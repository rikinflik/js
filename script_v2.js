/* libreria con funciones que comprueban campos genericos tipo:
checkLetters, checkNumber, checkLetAndNum, checkMail 
Comprobar en vivo y al final revisando todos los inputs obligatorios 
para luego poder enviar */
	
function check(param) 
{
	var elem = document.getElementById(param), 
		input = elem.getElementsByTagName('input')[0],
		list = elem.getElementsByTagName('span'),
		msj = msjError(param);

	 // if (param === 'login') {
	 // 	//console.log('estoy en login');
	 // 	status( letras(input.value), input, msj);
	 // } else if (param === 'mail') {
	 // 	status ( letras(input.value), input, msj);
	 // }

	 switch (param)
	 {
	 	case 'login':
	 		status ( letras(input.value), msj);
	 		break;
	 	case 'mail':
	 		status ( mail(input.value), msj);
	 		break;
	 	case 'password':
	 		status( largo(input.value), msj );
	 		break;
	 	case 'repass':
	 		status( repass(input.value), msj);
	 }
	 /*
	 * Funcion interna, para comprobar y mostrar al usuario si esta ok lo que introduce o no
	 * Recibe el input en el que afectar y el checkeo de si test es true/false más un msj
	 */
	function status(paramTest, paramMsj) {
		if (paramTest) {
	 		list[0].style.backgroundColor="rgba(0,215,0,0.5)";
	 		//list[0].style.backgroundColor="transparent";
	 		list[0].innerHTML = "";

	 	} else {
	 		input.style.backgroundColor="rgba(250, 255, 126, 0.5)";
	 		list[0].style.backgroundColor="rgba(255,0,0,0.5)";
	 		list[0].innerHTML = input.value + " " + paramMsj;
	 	}
	 	// setTimeout(function(){paramSpan.style.backgroundColor="rgba(0,215,0,0.2)"},3000);
	 	var interval = setInterval ( function (){
	 		input.style.backgroundColor="rgba(0,0,0,0)";
	 	}, 2000);

	}
}

/**
* Funcion que recibe un @param y comprueba si esta formado
* por letras, entre 2 y 10
* @return: si cumple la regExp de solo [a-z-A-Z]{2,10}
*/
function letras(param)
{
	var checkTest = false,
		regex = /^[a-zA-Z]{2,10}$/;

	if ( param.match(regex) ) {
		checkTest = true;
	}

	return checkTest;
}
/*
* Funcion para comprobar que el mail este correcto
*/
function mail(param){
	var check = false,
		regExpMail = /^([a-z]+[a-z1-9._-]*)@{1}([a-z1-9\.]{2,})\.([a-z]{2,3})$/;
	if (param.match(regExpMail)) {
		check = true;
	}
	return check;
}
/*
* Funcion que comprueba el largo de un input
* mayor o igual a 8
*/
	function largo(param) 
	{
		var check = false,
			largo = 8;
		if(param.length >= 8) {
			check = true;
		}
		return check;
	}
/*
* Funcion que comprueba que la re-contraseña se igual a la escritra anteriormente
*/
function repass(param) {
	var check = false,
		firstPass = document.getElementById('password').getElementsByTagName('input')[0].value;
	//console.log(firstPass);
	if (largo(param) && param == firstPass) {
		check = true;
	} 
	return check;

}
/*
* Funcion que sirve para filtrar el tipo de mensaje a mostrar segun el error
* @param: ID de la casilla
* @return: el msj segun el ID
*/
function msjError(param) 
{
	var msj = ':: es incorrecto :: ';
	switch (param) 
	{
		case "login": msj += 'Solo permite letras';
			break;
		case "mail": msj += 'Introduce un email valido';
			break;
		case "password": msj += 'No puede estar vacio y debe ser como minimo 8';
			break;
		case "repass": msj += 'Han de ser identicos';
			break;
	}
	return msj;
}