<?php
// Configuration for PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

function getMailer() {
    $mail = new PHPMailer(true);
    // Server settings
    $mail->isSMTP();
        
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAth   = 'true' ;
    $mail->Username   = 'thaianhvan2349@gmail.com'; // Replace with your Gmail address
    $mail->Password   = 'mbcujgpbntoxolaf';       // Replace with your Gmail password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
// $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  // Enable verbose debug output
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->Debugoutput = function($str, $level) {
      echo "Debug level $level; message: $str\n";
  };
    return $mail;
}
?>
