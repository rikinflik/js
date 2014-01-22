<?php 
	/*
	* Archivo de funciones del proyecto
	*/
 ?>
 <?php session_start(); ?>

<?php 
	function menu()
	{
?>
	<div class="sidebar">
		<ul>
			<li>Join</li>
			<li>Log in</li>
			<li>Profile</li>
			<li>View</li>
			<li>Upload</li>
		</ul>
	</div>
<?php
	}
?>
<?php 
	function form() 
	{
?>
		<div class="form">
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
						<input type="password" onblur="check('password')">
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
?>