<?php
    include_once 'public/header.php';
?>

<body>
    <div class="container text-center mt-5">
        <h1>Consulta de clientes frecuentes</h1>
        <table class="table mt-5">
            <tr>
                <th>idClienteFrecuente</th>
                <th>NombreCliente</th>
                <th>CorreoElectrónico</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>

            <?php
                foreach ($vars['cliente'] as $clientesfrecuentes) {
            ?>
            <tr>
                <td><?php echo $clientesfrecuentes['idClienteFrecuente']; ?></td>
                <td><?php echo $clientesfrecuentes['NombreCliente']; ?></td>
                <td><?php echo $clientesfrecuentes['CorreoElectronico']; ?></td>
                <td><?php echo $clientesfrecuentes['NumeroTelefonico']; ?></td>
                <td><a
                        href="?controlador=ClienteFrecuente&accion=buscarClientes&idClienteFrecuente=<?php echo $clientesfrecuentes['idClienteFrecuente']?>">
                        <img src="public/img/pencil.png"></a>
                    <a
                        href="?controlador=ClienteFrecuente&accion=eliminarClientes&idClienteFrecuente=<?php echo $clientesfrecuentes['idClienteFrecuente']?>">
                        <img src="public/img/remove.png"></a>

                </td>
            </tr>
            <?php
            }
            ?>

        </table>
    </div>
</body>