<?php
include_once 'public/header.php';
//session_start();
?>


<head>
    <title>Tu orden</title>
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Tu orden</h1>

        <div class="col-md-12">
            <table class="table mt-5 table-responsive-xl" id="table">
                <tr>
                    <th>Imagen</th>
                    <th>Platillo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

                <?php
             $ordenActual = $_SESSION["orden"];
             foreach($ordenActual as $platillo) {
            ?>
                <tr>
                    <td class="d-flex align-items-center">
                        <div class="img" style="background-image: url(<?php echo $platillo['imagen'];?>);">
                        </div>
                    </td>
                    <td class="align-items-center"><?php echo $platillo["nombre"]; ?></td>
                    <td class="align-items-center"><?php echo $platillo["cantidad"]; ?></td>
                    <td class="align-items-center"><?php echo $platillo["precio"]; ?></td>

                    <td>
                        <a
                            href="?controlador=Orden&accion=eliminarPlatilloOrden&IdPlatillo=<?php echo $platillo['id'];?>">
                            <img src="public/img/delete.png"></a>
                    </td>
                </tr>
                <?php
            }
            ?><?php
            $precioTotal=0;
            $cantidadTotal=0;
             foreach($ordenActual as $platillo) {
                 $precioTotal+=$platillo["precio"];
                 $cantidadTotal+=$platillo["cantidad"];
                }
                {
                  $precioTotalFinal=$precioTotal;
                  $cantidadTotalFinal=$cantidadTotal;
                }
            ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Cantidad total: <?php echo $cantidadTotalFinal; ?></th>
                    <th>Precio total: <?php echo $precioTotalFinal; ?></th>
                    <th></th>
                </tr>
            </table>
            <a href="#" data-bs-target="#exampleModal" data-bs-toggle="modal" class="btn btn-info">
                Terminar Orden
            </a>
        </div>
    </div>
    <?php
    include_once 'public/footer.php';
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container-contact2">
                        <div class="wrap-contact2">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="">
                                <h5 class="contact2-form-title" id="exampleModalLabel">Orden</h5>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="?controlador=Orden&accion=finalizarOrden"
                                    class="contact2-form validate-form">
                                    <div class=" row">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <label class="form-label">Nombre del cliente:</label>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <input type="text" class="form-control" name="nombreCliente">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <label class="form-label">Total:</label>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <input type="text" class="form-control" id="total" name="total"
                                                readonly="readonly" value="<?php echo $precioTotalFinal;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <label class="form-label">Número de mesa:</label>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                            <input type="text" class="form-control" id="numeroMesa" name="numeroMesa">
                                        </div>
                                    </div>

                                    <div class="container-contact2-form-btn">
                                        <div class="wrap-contact2-form-btn">
                                            <div class="contact2-form-bgbtn"></div>
                                            <button class="btn btn-info">
                                                Terminar orden
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
var table = document.getElementsById("table")[0]; // first table
var row = table.rows[index];
console.log(row.id);
</script>