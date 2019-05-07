<?php


date_default_timezone_set('Asia/Dhaka');

//must be include this file
require_once "src/PHPMailer.php";
require_once "src/SMTP.php";

//Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->IsSMTP(); // enable SMTP

$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail



$mail->Host = 'smtp.googlemail.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;

//send email form
$mail->Username = 'atikbakshi45';

//websiteemail@gmail.com password
$mail->Password = 'atik1470';

//Set who the message is to be sent from
$mail->setFrom('atikbakshi45@gmail.com', 'portfolio');



if(isset($_POST["contact_user"])){
		
		$name = $_POST["contact_user"];
		$email = $_POST["contact_email"];
		$massege = $_POST["contact_message"];
		$subject = $_POST["contact_subject"];
		
		if(!empty($name) && !empty($email) && !empty($massege) && !empty($subject)){
	









//Set an alternative reply-to address
$mail->addReplyTo($email, $name);

//Set who the message is to be sent to
$mail->addAddress('atikbakshi36@gmail.com', 'website-'.$name);

//Set the subject line
$mail->Subject = 'contact_subject';

//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

// message body
$mail->Body = $massege;

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors


if (!$mail->send()) {
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo "<span style='color:green'>Message sent successfully!</span>";
			}
	}else{
		echo "<span style='color:red'>Field must not empty!</span>";
	}
}