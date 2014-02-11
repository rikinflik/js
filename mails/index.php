<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inputs mail</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrap">
		<h1>Registrar una persona y mails</h1>
		<?php 
			if (isset($_GET['mail'])) {
				echo 'Guardado en la BBDD: '.$_GET['nombre'].' con los siguientes e-mails<br/>';
				$arrayMails = $_GET['mail'];
				foreach ($arrayMails as $mail) {
					echo 'mail: '.$mail.'<br/>';
				}
			} else {
		 ?>
		 <form id="formMails" action="index.php" method="get" class="formMail" >
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre">
			<label for="mail">Mail</label>
			<input type="text" name="mail[]" class="current" value="" ><span id="add" class="plus"></span>
			<input type="submit" value="Guardar">
		</form>
		<?php } ?>
	</div>
	<script src="script.js"></script>
</body>
</html>