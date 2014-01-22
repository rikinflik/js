<?php require_once('functions.php'); ?>
<?php require_once('insert.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="wrap">
		<div class="head">
			<h1>Join!</h1>
		</div>
		<?php menu(); ?>
		<?php 
			/* Comprobación de los datos introducidos */
			if ( isset($_GET['login']) ) {
				/* Comprobar el DNI 
				* sacado de: http://computersandprogrammers.blogspot.com.es/2012/12/expresion-regular-reconocer-dni.html
				* mirar la buena: http://nideaderedes.urlansoft.com/2011/10/21/funcion-en-php-para-calcular-si-un-dni-o-un-nie-son-validos/
				*/
				// $regExpDni = '/^([0-9]{8})([-]?)([a-zA-Z])$/'; //cambiar por una que compruebe real 
				// if (preg_match($regExpDni, $_GET['dni'])) {
				// 	$_SESSION['dni'] = $_GET['dni'];
				// } else {
				// 	$msjErrorDni = 'Ha habido un error. Solo funciona con DNI';
				// }

				/* Comprobar el nombre */
				$regExpNom = '/^[a-zA-Z]{3,10}/';
				if (preg_match($regExpNom, $_GET['login'])) {
					$_SESSION['login'] = $_GET['login'];
				} else {
					$_SESSION['error']['login'] = 'Ha habido un error. Min.3/Máx.10';
				}

				/* Si ha habido algun error */
				if ( !is_null($_SESSION['error']) ) {
					$_SESSION['msj']['required'] = 'Campos obligatorios';
					$_SESSION['msj']['opcional'] = 'Campos opcionales';
					form();
				} else {
					success('regPersona');
				}
			} else {
				form();
			}
		 ?>
	</div>
	<script src="script_v2.js"></script>
</body>
</html>