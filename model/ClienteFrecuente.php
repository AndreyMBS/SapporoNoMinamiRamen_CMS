<?php

    class ClienteFrecuente{
        protected $db;
        private static $instance = null;
        
        private function __construct(){
            require 'libs/UPDO.php';
            $this -> db = UPDO::singleton();
        }

        public static function singleton() {
            if (self::$instance == null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function guardarClientes($nombreCliente, $email, $telefono){
            $consulta = $this->db->prepare("INSERT INTO tbl_clientes_frecuentes VALUES(null,'".$nombreCliente."','".$email."','".$telefono."')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function actualizarClientes($idClienteFrecuente, $nombreCliente, $email, $telefono){
            $consulta = $this->db->prepare("UPDATE tbl_clientes_frecuentes SET NombreCliente= '".$nombreCliente."', CorreoElectronico= '".$email."', NumeroTelefonico='".$telefono."' WHERE idClienteFrecuente= $idClienteFrecuente");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function buscarClientes($idClienteFrecuente){
            $consulta = $this->db->prepare("SELECT * FROM tbl_clientes_frecuentes WHERE idClienteFrecuente=$idClienteFrecuente");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function eliminarClientes($idClienteFrecuente){
            $consulta = $this->db->prepare("DELETE FROM tbl_clientes_frecuentes WHERE idClienteFrecuente=$idClienteFrecuente");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }

        public function consultarClientes(){
            $consulta = $this->db->prepare("SELECT * FROM tbl_clientes_frecuentes");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            return $resultado;
        }
    }

?>