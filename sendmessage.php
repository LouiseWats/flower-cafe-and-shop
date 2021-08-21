<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    //Open a new connection to the MySQL server
    $mysqli = new mysqli('localhost', 'root', '', 'flowercafeandshop');

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
    $message= mysqli_real_escape_string($mysqli, $_POST['message']);

    $email2 = "";

    if (strlen($fname) > 50) {
        echo 'fname_long';

    } elseif (strlen($fname) < 2) {
        echo 'fname_short';

    } elseif (strlen($email) > 50) {
        echo 'email_long';

    } elseif (strlen($email) < 5) {
        echo 'email_short';

    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo 'eformat';

    } elseif (strlen($subject) > 30) {
        echo 'subject_long';

    } elseif (strlen($message) > 300) {
        echo 'message_long';

    } elseif (strlen($message) < 10) {
        echo 'message_short';

    } else {

        require 'vendor/autoload.php';

        
        $mail = new PHPMailer(true);
        
        // Use SMTP
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com'; 
        
        // Enable SMTP Authentication
        $mail->SMTPAuth = true;         
        
        // Choose Encryption Method: SSL/TLS
        $mail->SMTPSecure = 'ssl';     
        
        // Choose port to connect to
        $mail->Port = 465;    
        
        // Choose user account
        $mail->Username = '';   //Add your email             
        $mail->Password = '';  //Add your password

        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = $subject;
        $mail->FromName = $fname;
        $mail->From = $email2;
        $mail->Body = $message;

        // Add recipient
        $mail->addAddress('');    // Add your email
        $mail->AddReplyTo($email);


        if (!$mail->send()) {
            echo 'Message could not be sent.';
            $result = "Error";
        } else {
            $result = "Success";
        }
    }
?>

