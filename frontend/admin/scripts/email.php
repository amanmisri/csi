<?php
    ini_set('display_errors', '1');
    
    $to = 'idrees.d@somaiya.edu'; //Put all emails of recipients seperated by a comma 
    $name = $_POST['name'];
    $subject = "HTML email";
    $email = $_POST['email'];
    $message = $_POST['content'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com'; //currently using google's smtp
        $mail->SMTPAuth = true;                               
        $mail->Username = '';                 
        $mail->Password = '';                           
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to, '');

        //Content
        $mail->isHTML(true);                                
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo(json_encode(array('status' => 'OK', 'message' => 'Email sent successfully.')));
        
    } catch (Exception $e) {
        echo(json_encode(array('status' => 'OK', 'message' => 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo)));
    }

?>