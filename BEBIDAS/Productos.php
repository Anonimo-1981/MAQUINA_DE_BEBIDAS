<table border="1">
    <caption>Lista De Bebidas Vendidas</caption> 
    <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion.php';

    // Consulta correcta para seleccionar todos los datos
    $sql = "SELECT * FROM bebidas_vendidas";
    $resultado = $conex->query($sql);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Mostrar cada fila de datos
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['NOMBRE']) . "</td>";
            echo "<td>" . htmlspecialchars($row['CANTIDAD']) . "</td>"; // Asegúrate de que 'CANTIDAD' sea el nombre correcto del campo
            echo "<td>";
            echo "<a href='Eliminar.php?ID=" . urlencode($row['ID']) . "'>Eliminar</a> | ";
            echo "<a href='Editar.php?ID=" . urlencode($row['ID']) . "'>Editar</a> | ";
            echo "<a href='BEBIDAS_PRUEBA.php?ID=" . urlencode($row['ID']) . "'>Regresar</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No se encontraron bebidas. <a href='BEBIDAS_PRUEBA.php'>Regresar</td></tr>";
    }

    // Cerrar la conexión
    $conex->close();
    ?>
</table>