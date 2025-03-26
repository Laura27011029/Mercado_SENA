<?php
$cate = $_POST['categoria'] ;
include 'conexion.php';

//SQL to delete a record
$sql= "DELETE FROM categoria WHERE NOMBRE_CATEGORIA = '$cate'";

if ($conn->query($sql) === TRUE){  
    echo " Record deleted successfully";
} else { 
    echo " Error deleting record" . $conn->error;
}
$conn->close();


?>