<?php
include 'conexion.php';

// Verificar si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar la entrada
    $id = $conex->real_escape_string(trim($_POST['id']));
    $nuevoNombre = $conex->real_escape_string(trim($_POST['nombre']));
    $nuevaCantidad = $conex->real_escape_string(trim($_POST['cantidad']));

    // Consulta para actualizar la bebida
    $sql = "UPDATE bebidas_vendidas SET NOMBRE = ?, CANTIDAD = ? WHERE ID = ?";
    $stmt = $conex->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sii", $nuevoNombre, $nuevaCantidad, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Bebida Actualizada'); location.href='Productos.php';</script>";
        } else {
            echo "<script>alert('No se realizaron cambios.'); location.href='Productos.php';</script>";
        }

        $stmt->close();
    } else {
        echo "Error: " . $conex->error;
    }
}

// Cerrar la conexión
$conex->close();
?>
