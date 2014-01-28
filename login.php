
<?php
	function coockie($param) {
		setcookie("logcook", $param, time() + 3600);
	}
?>
<?php require_once('functions.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="wrap">
		<div class="head">
			<h1>Join!</h1>
		</div>
		<div class="sidebar">
			<?php menu(); ?>
		</div>
		<div class="login reg">
			<?php 
				if (isset($_GET['login'])) {
					$checkLogin = $_GET['login'];
					$checkPass = md5(trim($_GET['password']));
					echo 'pass in: '. $checkPass. '<br/>';
					$link = mysqli_connect("localhost", "root", "1234") or die ('Error'.mysqli_error($link));
					mysqli_select_db($link, "test") or die ('Error, no se puede conectar');
					$sentencia = "SELECT * FROM test.jbalmes WHERE login='$checkLogin'";
					$query = mysqli_query($link,$sentencia) or die ('Error en login: '.$sentencia.' - '.mysqli_error($link) );
					
					if( mysqli_affected_rows($link) > 0) {
						echo 'usuario correcto';
						//paso a array la fila entera
						$fila = mysqli_fetch_array($query, MYSQL_ASSOC);
						if ( $fila['password'] == $checkPass ) {
							echo '<h1>La contraseña es correcta</h1>';
							ini_set('session.auto_start', '1'); //buscar que hace
					        $_SESSION['login'] = $checkLogin;
					        if (isset($_GET['remember'])) {
					        	echo 'esto es para recordar';
					        	//setcookie(nombre,valor,tiempo)
					            coockie($checkLogin);

					            //setcookie("logcook", $_GET['login'], time() + 3600);
					            //setcookie("psw", $checkPass);
								// if (isset($_COOKIE['logcook'])) {
								// 	$tmp = $_COOKIE['logcook'];
								// 	echo $tmp;
								// 	foreach ($_COOKIE['logcook'] as $name => $value) {
								// 		$name = htmlspecialchars($name);
								// 		$value = htmlspecialchars($value);
							 	// 	  	echo "$name : $value <br />\n";
								// 	}
								// }
					        } else {
					            setcookie("log", "");
					            setcookie("psw", "");  //compte! el password es guarda sense encriptar

					        }
					        welcome();
						} else {
							echo 'pass bbdd: '.$fila['password'];
							echo '<h1>Constraseña incorrecta</h1>';
						}

					} else {
						echo 'usuario INCORRECTO';
					}
					
					//consulta del query con un if, via php.net mysqli_query
					// $query = mysqli_query($link,$sentencia);
					// //echo $query;
					// if ( $query ) {
					// 	$msj = '<h1>El usuario es incorrecto '. mysqli_error($link) .'</h1>';
					// 	die($mjs);
					// }
					mysqli_close($link);
					//echo 'estas en login.php';
										
				} else {
					login();
				}
			?>
		</div>
		
	</div>
	<script src="script_v2.js"></script>
</body>
</html>