<?php
$severname= "localhost";
$username= "root";
$password = "";
$bdname = "mercado";

//Create connection
$conn = new mysqli($severname, $username, $password, $bdname);

if ($conn-> connect_error){
    die("connection falied ". $conn -> connect_error);
}

$sql ="SELECT   NOMBRE_CATEGORIA FROM categoria";
$result = $conn->query($sql);

if ($result->num_rows > 0 ){

    while ($row = $result->fetch_assoc()){
        echo $row["NOMBRE_CATEGORIA"]. "<br>";
    }
}else {
     echo "0 resultados";
}
 $conn ->close();

?>