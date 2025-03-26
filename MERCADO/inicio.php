<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

</head>
<body>
    <form action="login.php" method="POST">
    <fieldset>
        <legend>INICIO DE SESIÓN</legend>
        <label>Usuario: <input type="text" name="usuario" id="usuario" size="40" maxlenght="10" tabindex="1" autofocus></label> <br> <br>
        <label>Contraseña: <input type="password" name="contraseña" id="contraseña" size="40" maxlenght="10" tabindex="2" autofocus></label>
    </fieldset>
    <button type="submit" > Iniciar Sesión </button>
    </form>

    
</body>
</html>