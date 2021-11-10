<?php

    class ClienteFrecuenteController{
        
        public function __construct(){
            $this->view = new View();
        }

        public function mostrar(){
            $this->view->show("ClientesFrecuentes/registrarClienteFrecuente.php", null);
        }

        public function guardarClientes(){
            $nombreCliente = $_POST["inputCliente"];
            $email = $_POST["inputEmail"];
            $telefono = $_POST["inputNumero"];

            include_once 'model/ClienteFrecuente.php';
            $clienteModel = ClienteFrecuente::singleton();
            $clienteModel->guardarClientes($nombreCliente, $email, $telefono);
            $this->view->show("main.php", null);
            echo '<script type="text/javascript">
                alert("Cliente agregado de forma correcta.");
            </script>';
        }

        public function consultarClientes(){
            include_once 'model/ClienteFrecuente.php';
            $clienteModel = ClienteFrecuente::singleton();
            $clientes['cliente'] = $clienteModel->consultarClientes();       
            $this -> view->show("ClientesFrecuentes/consultaClienteFrecuente.php", $clientes);
        }

        public function eliminarClientes(){
           $idClienteFrecuente = $_GET['idClienteFrecuente'];

           include_once 'model/ClienteFrecuente.php';
           $clientesFrecuentes = ClienteFrecuente::singleton();
           $clienteFrecuente['idClienteFrecuente'] = $clientesFrecuentes->eliminarClientes($idClienteFrecuente);
           $this->view->show("main.php", null);
           echo '<script type="text/javascript">
                alert("Se eliminó el registro del cliente.");
            </script>';
        }

        public function actualizarClientes(){
            $idCliente =  $_POST['idClienteFrecuente'];
            $nombreCliente = $_POST['inputCliente'];
            $email = $_POST['inputEmail'];
            $telefono = $_POST['inputNumero'];
    
            include_once 'model/ClienteFrecuente.php';
            $clienteModel = ClienteFrecuente::singleton();
            $clienteModel->actualizarClientes($idCliente, $nombreCliente, $email, $telefono);
            $this->view->show("main.php", null);
            echo '<script type="text/javascript">
                alert("Se actualizo la informacion del cliente.");
            </script>';
        }

        public function buscarClientes(){
            $idCliente = $_GET['idClienteFrecuente'];
    
            include_once 'model/ClienteFrecuente.php';
            $clienteModel = ClienteFrecuente::singleton();
            $clientes['cliente'] = $clienteModel->buscarClientes($idCliente);
            $this->view->show("ClientesFrecuentes/actualizarCliente.php", $clientes);
        }
    
    }

?>