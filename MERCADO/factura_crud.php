<?php
//Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercado";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Obtener clientes
$sqlClientes = "SELECT id_cliente, nombre_cliente FROM clientes";
$resultClientes = $conn->query($sqlClientes);

//Obtener productos
$sqlProductos = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, VALOR_PRODUCTO FROM productos";
$resultProductos = $conn->query($sqlClientes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
    <link rel="stylesheet" href="styless.css"
</head>
<body>
    <h2>Facturación</h2>

    <div class="total-factura">Total Factura Actual: <span id="totalFacturaActual"></span></div>

    <form action="procesar_factura.php" method="post">
        <label>Fecha de Emisión:</label>
        <input type="date" name="fecha_emision" value="<?php echo date('Y-m-d'); ?>">
        
        <label>Clientes:</label>
        <select name="id_cliente" required>
            <option value="">Seleccionar Cliente</option>
            <?php while($row = $resultClientes->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_cliente']; ?>"> <?php echo $row['nombre_cliente']; ?> </option>
            <?php } ?>
        </select>

        <h3>Productos</h3>
        <table id="productosTable">
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </table>

        <button type="button" onclick="agregarProducto()">Agregar Producto</button>
        <input type="submit" value="Terminar Factura">
    </form>

    <script>
    let productos = [];
    <?php while ($row = $resultProductos->fetch_assoc()) { ?>
        productos.push({ id: <?php echo $row['ID_PRODUCTO']; ?>, nombre: "<?php echo $row['NOMBRE_PRODUCTO']; ?>", precio: <?php echo $row['VALOR_PRODUCTO']; ?> });
        <?php } ?>
    
    function agregarProducto() {
        const table = document.getElementById('productosTable');
        const row = table.insertRow();

        //Agregar Descripción con lista desplegable
        let select = document.createElement('select');
        select.name = 'productos[]';
        productos.forEach(prod => {
            let option = document.createElement('option');
            option.value = prod.id;
            option.text = `${prod.nombre} - $${prod.precio}`;
            select.appendChild(option);
        });
        row.insertCell(0).appendChild(select);

        //Agregar Cantidad
        let cantidad = document.createElement('input');
        cantidad.type = 'number';
        cantidad.name = 'cantidad[]';
        cantidad.min = 1;
        cantidad.value = 1;
        cantidad.onchange = actualizarTotal;
        row.insertCell(1).appendChild(cantidad);

        //Agregar producto
        let precioUnitario = document.createElement('span');
        precioUnitario.innerText = "$0.00";
        row.insertCell(2).appendChild(precioUnitario);

        //Agregar Total
        let total = document.createElement('span');
        total.innerText = "$0.00";
        row.insertCell(3).appendChild(total);

        //Agregar Botón de Borrar
        let botonEliminar = document.createElement('button');
        botonEliminar.innerText = 'Borrar';
        botonEliminar.onclick = function () { table.deleteRow(row.rowIndex); actualizarTotal(); }
        row.insertCell(4).appendChild(botonEliminar);
        
        actualizarTotal();
    }

    function actualizarTotal() {
        const rows = document.querySelectorAll('#productosTable tr');
        let totalFactura = 0;
        
        rows.forEach((row, index) => {
            if (index === 0) return; //Saltar encabezado
            const select = row.cells[0].querySelector('select');
            const cantidad = parseInt(row.cells[1].querySelector('input').value);
            const producto = productos.find(p => p.id == select.value);

            row.cells[2].querySelector('span').innerText = `$${producto.precio.toFixed(2)}`;
            const totalProducto = producto.precio * cantidad;
            rowcells[3].querySelector('span').innerText = `$${totalProducto.toFixed(2)}`;
            totalFactura += totalProducto;
        });

        document.getElementById('totalFacturaActual').innerText = `$${totalFactura.tofixed(2)}`;
    }
    </script>

    </body>
    </html>
    <?php $conn->close(); ?>