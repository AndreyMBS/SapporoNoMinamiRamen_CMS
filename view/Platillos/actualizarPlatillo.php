<?php
    include_once 'public\header.php';
?>

<body>
    <div class="container text-center">
        <div class="mt-5 mb-5">
            <h1>Actualizar platillo</h1>
        </div>
        <form method="POST" action="?controlador=Platillo&accion=update" id="form" enctype="multipart/form-data">
            <?php
                foreach ($vars['platillo'] as $platillo) {
            ?>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">ID del platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" readonly="readonly" class="form-control" id="idPlatillo" name="idPlatillo"
                        placeholder="Ingrese el nombre del platillo" value="<?php echo $platillo['IdPlatillo']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Nombre del platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="nombrePlatillo" name="nombrePlatillo"
                        placeholder="Ingrese el nombre del platillo" value="<?php echo $platillo['NombrePlatillo']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Tipo de platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="tipo" name="tipo"
                        placeholder="Ingrese el tipo de platillo" value="<?php echo $platillo['Tipo']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Tamaño:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="tamanno" name="tamanno"
                        placeholder="Ingrese el tamaño del platillo" value="<?php echo $platillo['Tamanno']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Precio:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="number" class="form-control" id="precioPlatillo" name="precioPlatillo"
                        placeholder="Ingrese el precio del platillo (en CRC)"
                        value="<?php echo $platillo['PrecioPlatillo']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Imagen:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-dark">Actualizar</button>
            <?php
            }
            ?>
        </form>
    </div>
    <?php include_once 'public/footer.php';?>
</body>