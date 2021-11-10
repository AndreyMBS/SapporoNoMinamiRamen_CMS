<?php

    class PlatilloController{

    public function __construct(){
        $this->view = new View();
    }

    public function mostrar(){
        $this->view->show("Platillos/registrarPlatillo.php", null);
    }

    public function save() {
        $nombre = $_POST['nombrePlatillo'];
        $tipo = $_POST['tipo'];
        $tamanno = $_POST['tamanno'];
        $precio = $_POST['precioPlatillo'];

        $type= $_FILES['imagen']['type'];
        $imagen =  $_FILES['imagen']['tmp_name'];
        $nombreImagen = $_FILES['imagen']['name'];
        
        $nuevo_path = "public/images/".$nombreImagen;
        move_uploaded_file($imagen,$nuevo_path);
        $array = explode('.',$nuevo_path);
        $ext = end($array);

        include_once 'model/Platillo.php';
        $platillo = Platillo::singleton();
        $platillo->save($nombre, $tipo, $tamanno, $precio, $nuevo_path);
        $this->view->show("main.php", null);
        echo '<script type="text/javascript">
                alert("Se agregó el platillo al menu.");
            </script>';
      
    }//Fin de método save.

    public function update(){
        $idPlatillo = $_POST['idPlatillo'];
        $nombre = $_POST['nombrePlatillo'];
        $tipo = $_POST['tipo'];
        $tamanno = $_POST['tamanno'];
        $precio = $_POST['precioPlatillo'];

        $type= $_FILES['imagen']['type'];
        $imagen =  $_FILES['imagen']['tmp_name'];
        $nombreImagen = $_FILES['imagen']['name'];
        
        $nuevo_path = "public/images/".$nombreImagen;
        move_uploaded_file($imagen,$nuevo_path);
        $array = explode('.',$nuevo_path);
        $ext = end($array);


        include_once 'model/Platillo.php';
        $platillo = Platillo::singleton();
        $platillo->update($idPlatillo, $nombre, $tipo, $tamanno, $precio, $nuevo_path);
        $this->view->show("main.php", null);
        echo '<script type="text/javascript">
                alert("Se actualizó el platillo.");
            </script>';
    }

    public function buscarPlatillo(){
        $idPlatillo=$_GET['IdPlatillo'];

        include_once 'model/Platillo.php';
        $platillo = Platillo::singleton(); 
        $platillos['platillo'] = $platillo->buscarPlatillo($idPlatillo);
        $this->view->show("Platillos/actualizarPlatillo.php", $platillos);
    }

    public function consultarPlatillos(){
        include_once 'model/Platillo.php';
        $platillos = Platillo::singleton(); 

        $platillo['platillos'] = $platillos-> consultarPlatillos();
        $this -> view->show("Platillos/consultarPlatillo.php", $platillo);
    }   

    public function eliminarPlatillo(){
        $idPlatillo = $_GET['IdPlatillo'];

        include_once 'model/Platillo.php';
        $platillos = Platillo::singleton(); 
        $platillo['platillos'] = $platillos-> eliminarPlatillo($idPlatillo);
        $this->view->show("main.php", null);
        echo '<script type="text/javascript">
                alert("Se elimino el platillo del menu.");
            </script>';
     }

}