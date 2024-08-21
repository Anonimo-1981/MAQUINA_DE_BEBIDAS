<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegúrate de que 'Bebida' esté presente en el POST
    if (isset($_POST['Bebida']) && !empty($_POST['Bebida'])) {
        // Sanear y validar la entrada
        $bebida = $conex->real_escape_string(trim($_POST['Bebida']));

        // Preparar la consulta
        $sql = "INSERT INTO bebidas_vendidas (NOMBRE) VALUES ('$bebida')";

        // Ejecutar la consulta
        if ($conex->query($sql) === TRUE) {
            // Redirigir si la inserción fue exitosa
            header("Location: BEBIDAS_PRUEBA.php");
            exit(); // Asegúrate de que el script se detenga después de redirigir
        } else {
            // Manejar errores en la consulta
            echo "Error: " . $sql . "<br>" . $conex->error;
        }
    } else {
        // Manejar caso en que 'Bebida' no está en POST o está vacío
        echo "Por favor, ingrese una bebida.";
    }
} else {
    // Manejar caso en que el método de solicitud no es POST
    echo "Método de solicitud no permitido.";
}

// Cerrar la conexión
$conex->close();
?>
