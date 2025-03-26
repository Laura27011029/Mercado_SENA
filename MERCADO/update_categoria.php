<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercado";

//Create connection cadena de conexión
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if (isset($_POST['actualizar'])) {
    $id_categoria = $_POST['id_categoria'];
    $nuevo_nombre = $_POST['nuevo_nombre'];

    //Preparar la consulta sql
    $sql = "UPDATE categoria SET NOMBRE_CATEGORIA = ? WHERE ID_CATEGORIA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nuevo_nombre, $id_categoria);
    //bind_param() se usa en consultas preparadas con mysqli
    //sintaxis $stmt->binf_param("tipos"; $var1, $var2, ...);
    //"si" -> Indica que el primer valor ($nuevo_nombre) es string (s) y el segundo ($id_categoria) es integer

    if ($stmt->execute()) {
        echo "Categoría actualizada con éxito.";
    } else {
        echo "Error al actualizar la categoría: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>