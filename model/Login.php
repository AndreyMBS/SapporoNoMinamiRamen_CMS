<?php

    class Login{

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

         public function validarDatos($username, $passS){
             try {
             $pass = hash('ripemd160', $passS);
             $consulta = $this-> db->prepare("SELECT * FROM tbl_usuarios WHERE username = '".$username."' AND password = '".$pass."' ");
             $consulta->execute(array('$username' => $username, '$pass' =>$pass));
             $resultado = $consulta->fetchAll();
             $cantidadR = $consulta->rowCount();
     
             if ($cantidadR == 1) {
                 $_SESSION["username"] = $username;
                 $_SESSION["password"] = $pass; 
                 return true;

             } else {
                 $_SESSION["error"] = "ERROR";
                 return false;
             }
             } catch (Exception $e) {
                
             } finally {
                $sql = null;
                $consulta = null;
                $cantidadR = null;
                
            }
        }

        public function cerrarSesion(){
            if(isset($_SESSION["username"])){
                if(isset($_SESSION["password"])){
                session_destroy();
                }
        }
    }
        
}