<?php
include 'conexion.php';

$user_nombre = $_POST['usuario'];
$pass_usuario = $_POST['contraseña'];


$sql = "INSERT INTO usuarios (usuario,contraseña) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt -> bind_param("ss", $user_nombre, $pass_usuario);

if ($stmt -> execute()) {
    header("location: menu.php");
} else {
    echo "Error de registro de usuario";
}

$stmt -> close();
$conn -> close();
?>