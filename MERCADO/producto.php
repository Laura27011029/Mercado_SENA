<?php
include 'conexion.php';

// Obtener todos los productos
$sql = "SELECT p.ID_PRODUCTO, p.NOMBRE_PRODUCTO, p.CANTIDAD_PRODUCTO, c.NOMBRE_CATEGORIA
        FROM producto p
        JOIN categoria c ON p.ID_CATEGORIA = c.ID_CATEGORIA";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
</head>
<body>
    <h2>Gestión de Productos</h2>

    <!-- Formulario para Agregar un Producto -->
    <h3>Agregar Producto</h3>
    <form action="insert_producto.php" method="POST">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto" required>
        <input type="number" name="cantidad_producto" placeholder="Cantidad" required>
        <select name="id_categoria" required>
            <option value="">Seleccione una categoría</option>
            <?php
            $sqlCat = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA FROM categoria";
            $resultCat = $conn->query($sqlCat);
            while ($rowCat = $resultCat->fetch_assoc()) {
                echo "<option value='".$rowCat['ID_CATEGORIA']."'>".$rowCat['NOMBRE_CATEGORIA']."</option>";
            }
            ?>
        </select>
        <button type="submit" name="insertar">Agregar</button>
    </form>

    <h3>Lista de Productos</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_PRODUCTO'] ?></td>
            <td><?= $row['NOMBRE_PRODUCTO'] ?></td>
            <td><?= $row['CANTIDAD_PRODUCTO'] ?></td>
            <td><?= $row['NOMBRE_CATEGORIA'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['ID_PRODUCTO'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $row['ID_PRODUCTO'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>