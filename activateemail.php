<?php
//file used for sending and activating email: verifyong account
require 'scripts/PHPMailerAutoload.php';

//Instantiation
//declaring variables being used
$mail = new PHPMailer;
$to=$_SESSION['email'];
$activation_code=$_SESSION['activation_code'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];

    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    //Using gmail accounts
	$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'khurram.f1997@gmail.com';                     // SMTP username
    $mail->Password   = 'kFarooq2k18';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //recipients

    $mail->setFrom('khurram.f1997@gmail.com', 'Mailer');
     
	$mail->addAddress($to);     //add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    //Subject line in email
	$mail->Subject = 'Confirmation Email';
	//Body from email
    $mail->Body    = "Enter the following to access your account ----------------<br><br><br><br>
	
	Username:$username <br><br>
	
	Password:$password <br><br>
	
	Click here to activate your acocunt -------------------<br><br><br><br>
	
	http://localhost/webdev/travelagency2/verify.php?email=$email&activation_code=$activation_code";
	
if(!$mail->send()) {
    echo 'Message has been sent.';
    echo 'Mailor Error: ' . $mail->ErrorInfo;
}
?>