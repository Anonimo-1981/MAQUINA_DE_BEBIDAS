<!DOCTYPE html>
<html>
<head>
	<title>Registrar Usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo2.css">
</head>
<body background="logobebida.jpeg">
		<form method="POST">
			<h1>¡Maquina Expendedora De Bebidas!</h1>
			<h3>Escriba el nombre de la bebida que desea</h3>
			<select name="Bebida">
				<option>Coca Cola</option>
				<option>Pepsi</option>
				<option>7UP</option>
				<option>Lipton</option>
			</select>
				
			<h3>¿Cuántas bebidas lleva?</h3>
			<input type="number" name="cantidad" placeholder="cantidad" required>
			<input type="submit" name="register" value="Obtener">
		</form>
		<a href="Productos.php">Ver Productos Vendidos</a>
	<?php
	include("registrar_bebida.php")
	?>
</body>
</html>