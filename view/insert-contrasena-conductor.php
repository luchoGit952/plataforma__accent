<?php
include'conexion/conexion-db-accent.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email__contrasena = $_POST['email'] ? $_POST['email']: '';
if($email__contrasena ===""){
  echo json_encode('Necesitamos el email para continuar');
}else{
  $consulta__contraseña = "SELECT * FROM conductores WHERE email = '$email__contrasena' LIMIT 1";
  $resultado__consulta = mysqli_query($conexion__db__accent,$consulta__contraseña);
  if(mysqli_num_rows($resultado__consulta) > 0){
    $resultado__fila = mysqli_fetch_array($resultado__consulta);
    
    $nueva__contrasena = rand(10000000,99999999);
    $id__usuario = $resultado__fila['id_conductor'];
    $contrasena__encryptada  = password_hash($nueva__contrasena,PASSWORD_BCRYPT);
    $token = md5($resultado__fila['id_conductor']. time(). rand(1000,9999));

    $insertar__datos = mysqli_query($conexion__db__accent,"INSERT INTO recuperar__contrasena__conductor (email,clave__nueva,token) VALUES('$email__contrasena','$nueva__contrasena','$token')");

  $url = "http://localhost/accent__hollding/view/confirmacion-conductor?email=$email__contrasena&token=$token";

  $contenido__mensaje = ' <h1>Hola '.$resultado__fila['nombre_conductor'] .'<br> </h1>';
  $contenido__mensaje .='<p>has solicitado el cambio de tu credencial de acceso a nuestro sistema <br>
  nuestro algoritmo te ha generado una credencial aleatoria '.  $nueva__contrasena.' la cual es de un solo uso</p>';
  $contenido__mensaje .=' <p>Haz clik en el siguiente enlace <a href="'.$url.'">Pulsa aqui!</a>  para activar su credencial de acceso!  <br> <br> <br> <br></p>';
  $contenido__mensaje .='<p>Si no has sido tu omite este mensaje</p>';
  $mail = new PHPMailer(true);
  try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
      $mail->isSMTP();                                           
      $mail->Host       = '	smtp.office365.com';                  
      $mail->SMTPAuth   = true;                                 
      $mail->Username   = 'luisrbn10@outlook.es';                   
      $mail->Password   = 'Luisruben1073992580';                            
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
      $mail->SMTPSecure = 'tls';        
      $mail->Port       = 587;  
                              
      //Recipients
      $mail->setFrom('luisrbn10@outlook.es', 'Accent Corporation ');
      $mail->addAddress($email__contrasena,$resultado__fila['nombre_conductor'] );                  
   
  
      //Content
      $mail->isHTML(true);                                  
      $mail->Subject = 'Has solicitado el cambio de tus credencial de acceso a nuestra plataforma';
      $mail->Body    = $contenido__mensaje;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo json_encode('ok');
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  
  }else{
  echo  json_encode('No existe ese usuario');
  }

}



?>