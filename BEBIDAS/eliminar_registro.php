<?php
include 'conexion.php';

// Verificar si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conex->real_escape_string(trim($_POST['id']));

    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM bebidas_vendidas WHERE ID = ?";
    $stmt = $conex->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Registro eliminado correctamente'); location.href='Productos.php';</script>";
        } else {
            echo "<script>alert('No se encontró el registro para eliminar.'); location.href='Productos.php';</script>";
        }

        $stmt->close();
    } else {
        echo "Error: " . $conex->error;
    }
}

// Cerrar la conexión
$conex->close();
?>
