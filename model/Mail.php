<?php    

require 'libs/Mail/Exception.php';
require 'libs/Mail/PHPMailer.php';
require 'libs/Mail/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 class Mail{

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

    public function verificarCorreo($email){
        $consulta = $this-> db->prepare("SELECT * FROM user WHERE Email = '".$email."' ");
        $consulta->execute(array('$email' => $email));
        $resultado = $consulta->fetchAll();
        $cantidadR = $consulta->rowCount();
        if ($cantidadR == 1) {
            $this->enviarCorreo($email);
        }else{
            echo "El correo no existe. Verifiquelo de nuevo";
        }
    }

    public function updatePass($email, $newPass){
        $consulta = $this->db->prepare("UPDATE USER SET `Password`= '".$newPass."' WHERE `Email`= '$email'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function generateRandomString($length = 10) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 

    
    public function enviarCorreo($email){
        $enviado = 'Enviado: ' . date("Y-m-d H:i:s") . "\n";
        $subject = "Recuperar contraseña";
        $message = 'Su nueva contraseña es: ';
        $newPass = $this->generateRandomString();
        

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "correo@gmail.com";
        $mail->Password = "pasword";
        $mail->setFrom('correo@gmail.com', 'Recuperar la contraseña');
        $mail->addAddress($email, 'Otro usuario');
        $mail->Subject = $subject . $enviado;
        $mail->MsgHTML($message . $newPass);
        
        if (!$mail->send()) {
          echo "No se pudo enviar el correo. Intentelo más tarde.";
        } else {
         $passEnc = hash('ripemd160', $newPass);
          $this->updatePass($email, $passEnc);
          echo "Pronto se le enviará un correo con su nueva contraseña.";
        }
    }
}
 
?>