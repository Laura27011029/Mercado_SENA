<?php
include 'conexion.php';
$id = $_GET['id'];

$sql = "SELECT * FROM producto WHERE ID_PRODUCTO = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form action="update_producto.php" method="POST">
        <input type="hidden" name="id_producto" value="<?= $row['ID_PRODUCTO'] ?>">
        <input type="text" name="nombre_producto" value="<?= $row['NOMBRE_PRODUCTO'] ?>" required>
        <input type="number" name="cantidad_producto" value="<?= $row['CANTIDAD_PRODUCTO'] ?>" required>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>