/* libreria con funciones que comprueban campos genericos tipo:
checkLetters, checkNumber, checkLetAndNum, checkMail 
Comprobar en vivo y al final revisando todos los inputs obligatorios 
para luego poder enviar */

function check(param){
	var elem = document.getElementById(param);
	//console.log(elem);
	var list = elem.getElementsByTagName('span');
	//console.log(list);
	//list[0].innerHTML = "OLA K ASE";
	var inpu = elem.getElementsByTagName('input')[0].value;
	list[0].innerHTML = inpu;
	//console.log(elem.getElementsByTagName('input').value);
}
function testLe