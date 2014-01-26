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
		<div class="login">
			<?php 
				if (isset($_GET['login'])) {
					$checkLogin = $_GET['login'];
					$checkPass = md5($_GET['password']);

					$link = mysqli_connect("localhost", "root", "1234") or die ('Error'.mysqli_error($link));
					mysqli_select_db($link, "test") or die ('Error, no se puede conectar');
					$sentencia = "SELECT * FROM test.jbalmes WHERE login='$checkLogin'";
					$query = mysqli_query($link,$sentencia) or die ('Error en login: '.$sentencia.' - '.mysqli_error($link) );
					//paso a array la fila entera
					$fila = mysqli_fetch_array($query, MYSQL_ASSOC);
					if ( $fila['password'] == $checkPass ) {
						echo '<h1>La contraseña es correcta</h1>';
					} else {
						echo '<h1>Constraseña incorrecta</h1>';
					}
					mysqli_close($link);					
				} else {
					login();
				}
			?>
		</div>
		<div class="sidebar">
			<?php menu(); ?>
		</div>
	</div>
	<script src="script_v2.js"></script>
</body>
</html>