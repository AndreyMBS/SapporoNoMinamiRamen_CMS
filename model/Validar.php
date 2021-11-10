<?php

    class Validar{

        protected $db;
        private static $instance = null;
        private $cantidad_resultado = null;

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

        public function validarDatos() {

            try {
                $consulta=$this->db->prepare("SELECT * FROM tbl_usuarios WHERE username = '".$username."' AND password = '".$pass."'"); 
                $consulta->execute(array('$username'=>$_SESSION["username"], '$pass'=>$_SESSION["password"]));
                $cantidadR = $resultado->rowCount();
                
                if ($cantidadR == 0) {
                    session_start();
                    session_unset();
                    session_destroy();
                }                
            } catch (Exception $e) {
               
            } finally {
                $con = null;
                $sql = null;
                $consulta = null;
                $cantidadR = null;
            }
        }


    }

?>