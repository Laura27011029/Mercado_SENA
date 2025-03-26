<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form id="form" method="post" name="form">
        <b>Bienvenidos al Sistema</b><br>
        <p>Seleccione la base de datos que desea consultar</p>

        <button type="submit" onclick="document.getElementById('form').action='index.php'">
            Consultar categoría
        </button>

        <button type="submit" onclick="document.getElementById('form').action='producto.php'">
            Consultar productos
        </button>

        <button type="submit" onclick="document.getElementById('form').action='clientes.php'">
            Clientes
        </button>
    </form>


</body>
</html>


