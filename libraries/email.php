<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

//Load Composer's autoloader
require 'PHPMailer/src/SMTP.php';

function send_email($send_to_email, $send_to_fullname, $subject, $content, $option = array()){
    
    global $config;
    $config_email = $config['email'];
    $mail = new PHPMailer(true);

    try {
        # Cấu hình gửi 
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $config_email['smtp_host'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $config_email['smtp_user'];                 //SMTP username
        $mail->Password   = $config_email['smtp_pass'];                //SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure'];            //Enable implicit TLS encryption
        $mail->Port       = $config_email['smtp_port'];                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail -> CharSet = "UTF-8"; 

        //Recipients
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
        $mail->addAddress($send_to_email, $send_to_fullname);     // Người nhận
        // $mail->addAddress('ellen@example.com');               // thêm người nhận
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);    // Nơi nhận khi đc phản hồi lại
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        # Đính kèm file
        // $mail->addAttachment('chu_ky.jpg');                        //Add attachments
        // $mail->addAttachment('chu_ky.jpg', 'hungno.jpg');    //Optional name

        // Nội dung gửi
        $mail->isHTML(true);                                  //Gửi theo form HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Email không được gửi. Chi tiết lỗi. {$mail->ErrorInfo}";
    }

}

?>