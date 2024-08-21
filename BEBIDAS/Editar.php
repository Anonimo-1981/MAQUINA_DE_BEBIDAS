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

// Lista fija de bebidas
$bebidas = [
    'Coca-Cola',
    'Pepsi',
    '7UP',
    'Lipton',
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Bebida</title>
    <meta charset="utf-8">
</head>
<body>
    <form action="actualizar.php" method="POST">
        <h2>Editar Bebida</h2>
        <label for="nombre">Nombre</label>
        <select id="nombre" name="nombre" required>
            <?php
            // Mostrar las opciones del menú desplegable
            foreach ($bebidas as $bebida) {
                $selected = ($bebida === $row['NOMBRE']) ? 'selected' : '';
                echo "<option value=\"" . htmlspecialchars($bebida) . "\" $selected>" . htmlspecialchars($bebida) . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($row['CANTIDAD']); ?>" required>
        <br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['ID']); ?>">
        <br>
        <input type="submit" value="Guardar Cambios">
        <br>
        <a href="Productos.php">Regresar</a>
    </form>
</body>
</html>

<?php
// Cerrar la conexión
$conex->close();
?>
