<?php 

class Platillo{

    protected $db;
    private static $instance = null;

    private function __construct(){
        require'libs/UPDO.php';
        $this -> db = UPDO::singleton();
    }//Fin de constructor.

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function save($nombre, $tipo, $tamanno, $precio, $imagen){
        $consulta = $this->db->prepare("INSERT INTO tbl_platillos VALUES(null,'".$nombre."','".$tipo."','".$tamanno."','".$precio."', '".$imagen."')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }//Fin de función save.

    public function update($idPlatillo, $nombre, $tipo, $tamanno, $precio, $imagen){
        $consulta = $this->db->prepare("UPDATE tbl_Platillos SET NombrePlatillo='".$nombre."',Tipo='".$tipo."',Tamanno='".$tamanno."',PrecioPlatillo='".$precio."', Imagen='".$imagen."' WHERE IdPlatillo='".$idPlatillo."'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }//Fin de función update.

    public function consultarPlatillos(){
        $consulta = $this->db->prepare("SELECT * FROM tbl_Platillos");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function buscarPlatillo($idPlatillo){
        $consulta = $this->db->prepare("SELECT * FROM tbl_Platillos WHERE IdPlatillo='$idPlatillo'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function eliminarPlatillo($idPlatillo){
        $consulta = $this->db->prepare("DELETE FROM tbl_platillos WHERE IdPlatillo=$idPlatillo");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

}//Fin de clase Platillo.
?>