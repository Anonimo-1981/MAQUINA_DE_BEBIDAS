<?php
include 'conexion.php';

// Verificar si se recibe el parámetro 'ID' desde la URL
if (isset($_GET['ID'])) {
    $id = $conex->real_escape_string($_GET['ID']);

    // Consulta para obtener los datos de la bebida
    $sql = "SELECT * FROM bebidas_vendidas WHERE ID = '$id'";
    $result = $conex->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conex->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Bebida no encontrada.";
        exit;
    }
} else {
    echo "ID de bebida no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Bebida</title>
    <meta charset="utf-8">
</head>
<body>
    <form action="eliminar_registro.php" method="POST">
        <h2>Confirmar Eliminación</h2>
        <p>¿Está seguro de que desea eliminar la bebida "<?php echo htmlspecialchars($row['NOMBRE']); ?>"?</p>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['ID']); ?>">
        <input type="submit" name="eliminar" value="Eliminar">
        <a href="Productos.php">Cancelar</a>
    </form>
</body>
</html>

<?php
// Cerrar la conexión
$conex->close();
?>
