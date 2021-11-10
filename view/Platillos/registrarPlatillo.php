<?php
    include_once 'public\header.php';
?>

<body>
    <div class="container text-center">
        <div class="mt-5 mb-5">
            <h1>Registro de nuevo platillo</h1>
        </div>
        <form method="POST" action="?controlador=Platillo&accion=save" id="form" enctype="multipart/form-data">
            <input type='hidden' name='action' value='guardarPlatillo'>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Nombre del platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="nombrePlatillo" name="nombrePlatillo"
                        placeholder="Ingrese el nombre del platillo">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Tipo de platillo:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="tipo" name="tipo"
                        placeholder="Ingrese el tipo de platillo">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Tamaño:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="text" class="form-control" id="tamanno" name="tamanno"
                        placeholder="Ingrese el tamaño del platillo">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Precio:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <input type="number" class="form-control" id="precioPlatillo" name="precioPlatillo"
                        placeholder="Ingrese el precio del platillo (en CRC)">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <label class="form-label">Imagen:</label>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <!-- <input type="file" class="form-control" id="image" name="image" multiple> -->
                    <input type="file" class="form-control" id="imagen" name="imagen" multiple>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-dark">Registrar</button>
        </form>
    </div>
    <?php include_once 'public/footer.php'; ?>

    </html>