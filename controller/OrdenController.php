<?php

class OrdenController{

    public function __construct(){
        $this->view = new View();
    }


    public function agregarAlaOrden(){
        $id = $_GET['IdPlatillo'];
        $platillo = $this->buscarPlatillo( $id);

        foreach ($platillo as $plat) {
        $idPlatillo = $plat["IdPlatillo"];
        $nombrePlatillo = $plat["NombrePlatillo"];
        $tipo = $plat["Tipo"];
        $tamanno = $plat["Tamanno"];
        $precio = $plat["PrecioPlatillo"];
        $imagen = $plat["Imagen"];
        $cant=1;
        }

        
        include_once 'model/Orden.php';
        $orden = Orden::singleton(); 
        $orden->agregarOrdenActual($idPlatillo, $nombrePlatillo, $tipo, $tamanno, $precio, $imagen, $cant);
        echo '<script type="text/javascript">
                alert("Se agrego el platillo a la orden");
                window.history.back();
            </script>';
    }

    public function buscarPlatillo($idPlatillo){
       
        include_once 'model/Orden.php';

        $orden = Orden::singleton(); 
        $ordenes['platillo'] = $orden->consultarPlatillo($idPlatillo);
        return $ordenes['platillo'];
    }

    public function mostrarOrdenActual(){
        include_once 'model/Orden.php';
        $orden = Orden::singleton();

        $ordenes['ordenes'] = $orden-> consultarOrdenActual();
        $this -> view->show("Ordenes/ordenActual.php", $ordenes);
    }

    public function finalizarOrden(){
        //obtener todos los datos on pasarle la variable sesión
        $nombreCliente = $_POST['nombreCliente'];
        $total = $_POST['total'];
        $numMesa = $_POST['numeroMesa'];

        include_once 'model/Orden.php';
        $orden = Orden::singleton();

        $orden-> guardarOrden($nombreCliente, $total, $numMesa);
        $this->view->show("main.php", null);
    }

    public function eliminarPlatilloOrden(){
        $id = $_GET['IdPlatillo'];

        include_once 'model/Orden.php';
        $orden = Orden::singleton();

        $orden-> eliminarPlatilloO($id);
        $this->view->show("main.php", null);

    }
}