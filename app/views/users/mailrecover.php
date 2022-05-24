<?php

    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;               // Enable SMTP authentication
    $mail->Username = 'tikeytk22@gmail.com';   // SMTP username
    $mail->Password = 'Digicotek@22';   // SMTP password
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                    // TCP port to connect to

    // Sender info
    $mail->setFrom('tikeytk22@gmail.com', 'Teklit');
    $mail->addReplyTo('teklit.t@digicotek.com', 'Teklit');

    // Add a recipient
    $mail->addAddress($data['userEmail']);
    
    // Add attachments
    $mail->addAttachment('imgLogo/attachment.jpg', 'Digicotek'); // Optional name
    // Set email format to HTML
    $mail->isHTML(true);
    // Mail subject
    $mail->Subject = 'Email from local host to test';
    // Mail body content
    $bodyContent = '<h3>'.$data['userEmail']."  id-  ".$data['userId'].'Modifier votre mot de passe</h3>';
    $bodyContent .= '<p>En cliquant le le lien, vou pouvez modifier votre mot de passe.<b>Digicotek</b></p>';
    $bodyContent .= '<button><a href="http://localhost/DigicotekStage/digicotekchantier/users/editpassword/'.$data['userId'].'"> Cliquer ici<a><button>';
    $mail->Body   = $bodyContent;

    // Send email 
    if(!$mail->send()) { 
       // echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        $msg= "Le lien n'a pas pu être envoyé. Erreur de messagerie : vérifiez que votre adresse e-mail est correcte.";
        SessionHelper::setSession("useremail", $data['userEmail']);
        SessionHelper::setSession("ErrorMessage", $msg);
        SessionHelper::redirectTo('/users/forgetpd');
    } else { 
        //echo 'Message has been sent.'; 
        $msg= "Le lien a été envoyé. vérifiez votre email pour changer votre mot de passe.";
        SessionHelper::setSession("SuccessMessage", $msg);
        SessionHelper::redirectTo('/users/forgetpd'); 
    } 



