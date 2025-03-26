<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCADO</title>
</head>
<body>
    <form id="form" method="post" name="form">
    <fieldset>
        <legend>CATEGORIAS</legend>
        <label>Nombre Categoria: <input type="text" name="categoria" size="40" maxlenght="10" tabindex="2" autofocus></label>
    </fieldset>
    <input type="button" value="Insertar Datos" id="nuevo" name="nuevo" onclick="document.form.action ='insertar.php';
        document.form.submit()">
    <input type="button" value="Eliminar Datos" id="eliminar" name="eliminar" onclick="document.form.action='eliminar.php';
        document.form.submit()">
    <input type="button" value="Consulta" id="consulta" name="consulta" onclick="document.form.action='consulta.php';
        document.form.submit()">
    <input type="button" value="Actualiza" id="actualiza" name="actualiza" onclick="document.form.action='frm_actualizar.php';
        document.form.submit()"/>    
    </form>
</body>
</html>