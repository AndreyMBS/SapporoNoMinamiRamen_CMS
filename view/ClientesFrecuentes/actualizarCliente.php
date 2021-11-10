<?php
    include_once 'public\header.php';
?>

<body>
    <div class="container text-center">
        <div class="mt-5 mb-5">
            <h1>Actualizar Cliente Frecuente</h1>
        </div>
        <form method="POST" action="?controlador=ClienteFrecuente&accion=actualizarClientes" id="form">
            <?php
                foreach ($vars['cliente'] as $clientes) {
            ?>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">ID del platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" readonly="readonly" class="form-control" id="idClienteFrecuente"
                        name="idClienteFrecuente" value="<?php echo $clientes['idClienteFrecuente']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Nombre del cliente:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="inputCliente" name="inputCliente"
                        value="<?php echo $clientes['NombreCliente']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Correo electrónico:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                        value="<?php echo $clientes['CorreoElectronico']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Número telefónico:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="number" class="form-control"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        id="inputNumero" name="inputNumero" value="<?php echo $clientes['NumeroTelefonico']; ?>"
                        maxlength="8">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark">Actualizar</button>
            <?php
            }
            ?>
        </form>
    </div>

    </html>