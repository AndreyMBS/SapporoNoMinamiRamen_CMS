<?php

session_start();

class MainController {

    public function __construct() {
        $this->view = new View();
        //$this-> validar();
    }

    public function mostrarPage() {
        $this->view->show("main.php", null);
    }

    public function validar(){
        if (isset($_SESSION["Email"]) && isset($_SESSION["Password"])) {
    
            require_once 'model/Validar.php';
            $valida = Validar::singleton();
            $valida->validarDatos();
            
            $this->view->show("main.php", null);
        
        } else {
        
           if (isset($_SESSION["error"])) {
        
           echo "<p>Usuario y/o contraseña incorrecto</p>";
           unset($_SESSION["error"]);  
             
        }
        
        $this->view->show("loginView.php", null);
           
        }
    }

   

} 