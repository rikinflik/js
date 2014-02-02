function addEvent (element, evnt, funct)
{
	return element.addEventListener(evnt, funct, false);
}
//contador de inputs a generar
var count = 0;

addEvent (
		//selecciono el formulario
		//document.forms['formMails'],
		document.getElementById('add'),
		'click',
		function () 
		{
			var input = document.forms['formMails'].getElementsByTagName('input'),
				 newInput = document.createElement('input');
					
			if ( count < 2) { // solo se pueden hacer 3
				if ( count == 1) {
					document.getElementById('add').className = 'minus';
				}
				newInput.type = 'text';
				newInput.name = 'mail[]';
				newInput.className = 'current';
				console.log('new input: '+newInput);
				for (i = 0; i < input.length; i++) {
					if (input[i].className.match('current')) {
						lastInputCurrent = i;
						console.log(lastInputCurrent);
						valueInput = input[i].value; //guardo lo introducido por el usuario para ponerlo luego en el value=
					}
				}
				var e = document.forms['formMails'].getElementsByTagName('input')[lastInputCurrent];
				var i = newInput;
				insertAfter(e,i);
				input[lastInputCurrent].setAttribute('value', valueInput); //le añado el atributo value con el valor introducido por el usuario
				input[lastInputCurrent].className = 'mclass';
				//console.log(input[i]);
				count++;
				console.log(count);
			} else {
				console.log('error');
				document.getElementById('add').className = 'minus';
			}
		}
	);
addEvent (
	document.getElementById('add'),
	'click',
	function ()
	{
		var boton = document.getElementById('add'),
				padre = document.getElementsByTagName('input');
		if (boton.className.match('minus')) {
			padre.removeChild( padre.getElementsByName('mail[]')[1] );
		}
	}
);
//evento para añadir el valor, en el caso que añada varios campos a la vez
addEvent (
	document.forms['formMails'],
	'click',
	function ()
	{
		var mailName = document.getElementsByName('mail[]');
		for (i = 0; i < mailName.length; i++) {
			valor = mailName[i].value;
			mailName[i].setAttribute('value', valor);
		}
	}
);

function insertAfter(e,i)
{ 
	if(e.nextSibling){ 
		e.parentNode.insertBefore(i,e.nextSibling); 
	} else { 
		e.parentNode.appendChild(i); 
	}
}
