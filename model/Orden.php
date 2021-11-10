<?php
    session_start();

    class Orden{
        protected $db;
        private static $instance = null;

        private function __construct(){
            require'libs/UPDO.php';
            $this -> db = UPDO::singleton();
        }

        public static function singleton() {
            if (self::$instance == null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function consultarPlatillo($idPlatillo){
            $consulta = $this->db->prepare("SELECT * FROM tbl_Platillos WHERE IdPlatillo='$idPlatillo'");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function agregarOrdenActual($idPlatillo, $nombrePlatillo, $tipo, $tamanno, $precio, $imagen, $cant){
           
            $orden = array("id" => $idPlatillo, 
            "nombre" => $nombrePlatillo,
            "tipo" => $tipo, 
            "tamanno" => $tamanno, 
            "precio" => $precio, 
            "imagen" => $imagen,
            "cantidad" => $cant
            );
          
            $_SESSION["orden"][]=$orden;
            
            return $orden;
        }

        public function consultarOrdenActual(){

            if(isset($_SESSION["orden"])){
                return $_SESSION["orden"];
            }else{
                echo '<script type="text/javascript">
                alert("No hay ordenes en espera!");
                window.history.back();
            </script>';
            }
        }

        public function asignarNumeroOrden(){
            $numOrder = $this->consultarNumeroOrden();
            $numOrder = (int)$numOrder[0]["MAX(IdOrden)"];

            if($numOrder != 0){
                $numeroOrden = $numOrder+1;
            }else{
                $numeroOrden = 1;
            }
            return $numeroOrden;
        }


        public function guardarOrden($nombreCliente, $total, $numMesa){
            $this->guardarOrdenDetalle( $total);

            $consulta = $this->db->prepare("INSERT INTO tbl_Ordenes VALUES(null,'".$nombreCliente."','".$total."','".$numMesa."')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            session_destroy();
            return $resultado;
            
        }

         public function guardarOrdenDetalle( $total){
            $ordenNum = $this->asignarNumeroOrden();

            if(isset($_SESSION["orden"])){
                foreach ($_SESSION["orden"] as $orden => $valor) {
                    $idPlatillo = $valor["id"];
                    $precio = $valor["precio"];
                    $cantidad= $valor["cantidad"];
                    $subtotal = $precio * $cantidad;
                    $descuento = 0;
                    $consulta = $this->db->prepare("INSERT INTO tbl_detalleorden VALUES (".$ordenNum.", null,".$idPlatillo.",".$precio.",".$cantidad.",".$subtotal.",".$descuento.",".$total.")");
                    $consulta->execute();
                    $resultado = $consulta->fetchAll(); 
                }
            }
            $consulta->closeCursor();
            
            return $resultado;            
        }

        public function consultarNumeroOrden(){
            $consulta = $this->db->prepare("SELECT MAX(IdOrden) FROM tbl_Ordenes");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }


        public function consultarOrdenes(){
            $consulta = $this->db->prepare("SELECT * FROM tbl_Ordenes");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function eliminarPlatilloO($id){
            $max = sizeof($_SESSION['orden']);
            $ordenActual = $_SESSION["orden"];
            $arreglo = array();
            $arreglo = $_SESSION["orden"];

            $contador = 0;

            while ($contador < $max) {
                if($id == $arreglo[$contador]["id"]){
                    unset($arreglo[$contador]);
                    $arreglo = array_values($arreglo);
                    $contador++;
                }
                $contador++;
            }
            $_SESSION["orden"]=$arreglo;
        }
    }
    
?>