<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categoría</title>
    <style>
        form { width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input, button, select{width: 100%; margin: 10 px 0; padding: 10px;}
    </style>
</head>
<body>
    <h2>Actualizar Categoria</h2>
    <form action="update_categoria.php" method="POST">
        <label for="id_categoria">Seleccione la Categoria:</label>
        <select name="id_categoria" required>
            <option value="">Seleccione una Categoria</option>
            <?php
            include 'conexion.php';
            $sql = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA FROM categoria";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['ID_CATEGORIA']."'>".$row['NOMBRE_CATEGORIA']."</option>";
            }
            ?>
        </select>
        <input type="text" name="nuevo_nombre" placeholder = "Nuevo Nombre De La Categoria" required>
        <button type="submit" name="actualizar">Actualizar Categoria</button>
    </form>
</body>
</html>