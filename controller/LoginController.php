<?php

 class LoginController {

     public function __construct() {
         $this->view = new View();
     }

     public function mostrar() {
         $this->view->show("loginView.php", null);
     }

     public function ingresar(){
        if (isset($_POST["username"]) && isset($_POST["pass"])) {
            require_once 'model/Login.php';
            $validar = Login::singleton();
            $test = $validar->validarDatos($_POST['username'], $_POST['pass']);
            if($test){
                $this->view->show("main.php", null);
            }else {
                $this->view->show("loginView.php", null); 
            }
        } 
     }

     public function olvidoPass(){
        $email = $_POST['emailC'];
        
        include_once 'model/Mail.php';
        $mail = Mail::singleton();
        $mail->verificarCorreo($email);
        $this->view->show("loginView.php", null);
     }

    public function cerrarSesion(){
        require_once 'model/Login.php';
        $login = Login::singleton();

        $login->cerrarSesion();
        $this->view->show("loginView.php", null);
    }
    
 }