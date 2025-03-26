<?php
$servername = "localhost";
$username = "root" ;
$password = "";
$dbname = "mercado" ;
$cate=$_POST['categoria'];

// Create connection cadena de conexión
$conn = new mysqli($servername,$username,$password,$dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO categoria (NOMBRE_CATEGORIA) VALUES ('$cate')";
// - VALUES ('$_POST[primer_nombre]','$_POST[segundo_nombre]','$_POST[email]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql  .  "<br>" . $conn->error;
}
$conn->close();
?>
