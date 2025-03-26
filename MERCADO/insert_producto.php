<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_producto = ($_POST['nombre_producto']);
    $cantidad_producto = intval($_POST['cantidad_producto']);
    $id_categoria = intval($_POST['id_categoria']);

    $sql = "INSERT INTO producto (NOMBRE_PRODUCTO, CANTIDAD_PRODUCTO, ID_CATEGORIA) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nombre_producto, $cantidad_producto, $id_categoria);

    if ($stmt->execute()) {
        // Redirigir automáticamente a productos.php después de insertar
        header("Location: productos.php");
        exit(); // Asegurar que el script se detiene aquí
    } else {
        echo "Error al agregar producto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>