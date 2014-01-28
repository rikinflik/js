<?php 
	/*
	* Archivo de funciones del proyecto
	*/
 ?>
 <?php session_start(); ?>

<?php 
	/*
	* Funcion que muestra un menu en todas las paginas
	*/
	function menu()
	{
?>
	<div class="sidebar">
		<ul>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Log in</a></li>
			<li>Profile</li>
			<li>View</li>
			<li>Upload</li>
		</ul>
	</div>
<?php
	}
?>
<?php 
	/*
	* Funcion que muestra el formulario de registro de la pagina
	*/
	function form() 
	{
?>
		<div class="form">
			<h1>Nuevo registro</h1>
			<form id="formulario" action="register.php" method="get">
				<ul class="login">
					<h3><?php echo $_SESSION['msj']['required']; ?></h3>
					<li id="login">
						<label for="login">login</label>
						<input type="text" name="login" onblur="check('login')">
						<span class="estado"><?php echo $_SESSION['error']['login']; ?></span>
					</li>
					
					<li id="mail">
						<label for="mail">e-mail</label>
						<input type="email" name="email" onblur="check('mail')">
						<span class="estado"><?php echo $_SESSION['error']['mail']; ?></span>
					</li>
					<li id="password">
						<label for="password">password</label>
						<input type="password" name="password" onblur="check('password')">
						<span class="estado"><?php echo $_SESSION['error']['pass']; ?></span>
					</li>
					
					<li id="repass">
						<label for="repass">repeat password</label>
						<input type="password" onblur="check('repass')">
						<span class="estado"><?php echo $_SESSION['error']['repass']; ?></span>
					</li>
				</ul>

				<ul class="personal">
					<h3><?php echo $_SESSION['msj']['opcional']; ?></h3>
					<li id="nif">
						<label for="nif">nif</label>
						<input type="text" name="nif" onblur="check('nif')">
						<span class="estado"></span>
					</li>
					<li id="nombre">
						<label for="nombre">nombre</label>
						<input type="text" name="nombre" onblur="check('nombre')">
						<span class="estado"></span>
					</li>
					<li id="apellido">
						<label for="apellido">apellido</label>
						<input type="text" name="apellido" onblur="check('apellido')">
						<span class="estado"></span>
					</li>
					<li id="telf">
						<div class="telf">
							<label for="telf">teléfono</label>
							<input type="number" name="telf" onblur="check('telf')">
							<span class="estado"></span>
						</div>
						<div class="mov">
							<label for="mov">móvil</label>
							<input type="number" name="mov" onblur="check('mov')">
							<span class="estado"></span>
						</div>
					</li>
				</ul>
				<input type="submit" value="Enviar" >
			</form>
		</div>
<?php
	}
	/*
	* Funcion para insertar en la BBDD los datos introducidos en el formulario
	* por el usuario.
	*/
	function success() {

		$loginSave = $_SESSION['login'];
		$mailSave = $_SESSION['mail'];
		//encripto el password para guardarlo en la BBDD
		$pwdSave = md5($_SESSION['password']);

		//conexion con la bbdd
		$link = mysqli_connect("localhost", "root", "1234") or die ('Error'.mysqli_error($link));
		mysqli_select_db($link, "test") or die ('Error, no se puede conectar');
		$sentencia = "INSERT INTO test.jbalmes(login,mail,password) VALUES ('$loginSave','$mailSave','$pwdSave')";
		mysqli_query($link,$sentencia) or die ('Error en: '.$sentencia.' - '.mysqli_error($link) );
		mysqli_close($link);
		echo '<h1>Registro realizado correctamente</h1>';
		session_destroy();
	}

	function login() {

	if (isset($_COOKIE['logcook'])) {
		// foreach ($_COOKIE['logcook'] as $name => $value) {
		// 	$name = htmlspecialchars($name);
		// 	$value = htmlspecialchars($value);
  //     	  	echo "$name : $value <br />\n";

		// }
		echo 'hola! cookie';
	} else { 
?>
	<h1 id="mostrar" class="">Login <span class="plus"></span></h1>
	<div class="formlog">
		<form action="login.php" method="get" name="login" id="formlog" class="hidden">
			<label for="login">Nombre</label>
			<input type="text" name="login" value="<?php if(isset($_COOKIE['logcook'])) echo $_COOKIE['logcook']; ?>">
			<label for="password">Password</label>
			<input type="password" name="password">
			<label for="remember">Recordar login</label>
			<input type="checkbox" name="remember" id="remember">
			<input type="submit" value="Log in">
		</form>
	</div>
<?php
		}
 
	} 
	function welcome()
	{
?>
	<h1>Bienvenido usuario <?php echo $_COOKIE['logcook']; ?></h1>
<?php
	}

?>
