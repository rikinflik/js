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
		<form action="index.php" method="get" class="formMail">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre">
			<label for="mail">Mail</label>
			<input type="text" name="mail" class="current"><span class="plus"></span>
			<input type="submit" value="Guardar">
		</form>
	</div>
	<script src="script.js"></script>
</body>
</html>