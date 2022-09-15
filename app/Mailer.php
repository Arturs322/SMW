<?php
namespace App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Mailer {

    private string $name;
    private string $email;
    private string $message;
    private string $password;
    private string $smtp;

    public function __construct(string $name, string $email, string $message, string $password = " ", string $smtp = "smtp.gmail.com")
    {
        $this->name = $name;
        $this->email= $email;
        $this->message = $message;
        $this->password = $password;
        $this->smtp = $smtp;
    }

    public function sendEmail($recipient = " ", $subject = "True forged wheels")
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->smtp;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->email;                     //SMTP username
            $mail->Password   = $this->password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($this->email, $this->name);
            $mail->addAddress($recipient);     //Add a recipient

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $this->message;

            if (isset($_POST['submit']))
            {
                $mail->send();

            }
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}