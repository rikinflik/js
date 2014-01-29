<?php session_start(); ?>
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
				if ($_GET['logout'] == 'exit') {
			?>	
				<h1 class="user-login">Vuelve pronto!</h1>
				<?php session_destroy();?>
				<h2><a href="login.php">Back to login</a></h2>
			<?php
				} else {
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
					        if (isset($_GET['remember'])) {
					        	echo 'esto es para recordar';
  						        $_SESSION['login'] = $checkLogin;

					        	//setcookie(nombre,valor,tiempo)
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
					mysqli_close($link);
					//echo 'estas en login.php';
										
				} else {
					login();
				}
				}
				
			?>
		</div>
		
	</div>
	<script src="script_v2.js"></script>
</body>
</html>