<?php
	// Conexión a la base de datos
	include'conexion.php';

	// Verificar si se envió el formulario
	if (isset($_POST['register'])) {
		if (strlen($_POST['Bebida']) >= 1){
			$nombre_bebida = trim($_POST['Bebida']);
			$cantidad = trim($_POST['cantidad']);
			$fecha_registro = date("d/m/y");
			$Consulta = "INSERT INTO bebidas_vendidas(NOMBRE, CANTIDAD, FECHA_REGISTRO) VALUES ('$nombre_bebida','$cantidad','$fecha_registro')";
			$resultado = mysqli_query($conex, $Consulta);
			if ($resultado){
				?>
					<h3 class="ok">Bebida Retirada Correctamente, ¡Gracias!</h3>
				<?php
			}else{
				?>
					<h3 class="bad">Problema Tecnico, don't worry</h3>
				<?php
			}
		}
		else{
			?>
				<h3 class="bad">No escribio ninguna bebida!</h3>
			<?php
		}
	}
?>
