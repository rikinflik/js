<?php require_once('functions.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="wrap">
		<div class="head">
			<h1>Join!</h1>
			<?php foreach ($_COOKIE['logcook'] as $name => $value) {
				$name = htmlspecialchars($name);
				$value = htmlspecialchars($value);
	 		  	echo "$name : $value <br />\n";
			} ?>
		</div>
		<div class="menu">
			<?php menu(); ?>
		</div>
		<div class="login reg">
			<?php login(); ?>
		</div>
		
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
				/* Falta comprobar el mail, password y repassword
				de momento lo compruebo solo con el filtro de javascript */
				$_SESSION['mail'] = $_GET['email'];
				$_SESSION['password'] = $_GET['password'];

				/* Si ha habido algun error */
				if ( !is_null($_SESSION['error']) ) {
					$_SESSION['msj']['required'] = 'Campos obligatorios';
					$_SESSION['msj']['opcional'] = 'Campos opcionales';
					form();
				} else {
					$_SESSION['success'] = true;
					success();
				}
			} else {
				form();
			}
		 ?>
	</div>
	<script src="script_v2.js"></script>
</body>
</html>