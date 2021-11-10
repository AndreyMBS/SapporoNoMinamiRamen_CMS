<?php
include_once 'public/header.php';
?>

<body>
    <div class="container text-center mt-5">
        <h1>Platillos disponibles</h1>
        <div class="row mt-3 mb-2">
            <div class="col align-self-end">
                <a class=" btn btn-info" href="?controlador=Orden&accion=mostrarOrdenActual">Ver orden
                    actual</a>
            </div>
        </div>
        <form method="POST" action="?controlador=Orden&accion=agregarAlaOrden">
            <div class="row">
                <?php
                foreach ($vars['platillos'] as $platillo) {
                ?>
                <div class="col-6 col-sm-6 col-lg-4 col-md-4 mt-4">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="<?php echo $platillo["Imagen"];?>" alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <h5 class="card-title"><?php echo $platillo['NombrePlatillo']; ?></h5>
                            <p class="card-text">Tipo: <?php echo $platillo['Tipo']; ?></p>
                            <p class="card-text">Precio: <?php echo $platillo['PrecioPlatillo']; ?></p>
                            <p class="card-text">Tamaño: <?php echo $platillo['Tamanno']; ?></p>
                            <a href="?controlador=Orden&accion=agregarAlaOrden&IdPlatillo=<?php echo $platillo['IdPlatillo'];?>"
                                role="button"><img src="public/img/add.png"></a>
                            <a href="?controlador=Platillo&accion=buscarPlatillo&IdPlatillo=<?php echo $platillo['IdPlatillo'];?>"
                                role="button" data-id='<?php echo $platillo['IdPlatillo'];?>'>
                                <img src="public/img/pencil.png"></a>
                            <a href="?controlador=Platillo&accion=eliminarPlatillo&IdPlatillo=<?php echo $platillo['IdPlatillo'];?>"
                                role="button" data-id='<?php echo $platillo['IdPlatillo'];?>'>
                                <img src="public/img/remove.png"> </a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php include_once 'public/footer.php'; ?>
</body>