<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                             // Passing `true` enables exceptions

try {
    // Adding in data from form
    $coname = htmlspecialchars($_POST['coname']);
    $rltrname = htmlspecialchars($_POST['rltrname']);
    $rltremail = htmlspecialchars($_POST['rltremail']);
    $clntname = htmlspecialchars($_POST['clntname']);
    $clsngdate = htmlspecialchars($_POST['clsngdate']);
    $clntaddy = htmlspecialchars($_POST['clntaddy']);
    $clntph = htmlspecialchars($_POST['clntph']);
    $notes = htmlspecialchars($_POST['notes']);

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'testing@docslocsmk.burntyokes.com';             // SMTP username
    $mail->Password = 'DocsLocsAdmin1';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to

    // Recips
    $mail->From = "testing@docslocsmk.burntyokes.com";
    $mail->FromName = "Docs Locs FTW";
    $mail->addAddress("docslocs@gmail.com", "Docs Locs FTW");
    $mail->AddCC("jasen.burkett@gmail.com", "YhwhDesign");
    
    $mail->isHTML(true);
    $mail->Subject = "Docs Locs FTW - Request";

    $message = "<table>
	<tr><td>Co Name: </td><td>" . $_POST["coname"] . "</td></tr>
	<tr><td>Realtor Name: </td><td>" . $_POST["rltrname"] . "</td></tr>
	<tr><td>Realtor Email: </td><td>" . $_POST["rltremail"] . "</td></tr>
    <tr><td>Client Name: </td><td>" . $_POST["clntname"] . "</td></tr>
    <tr><td>Closing Date: </td><td>" . $_POST["clsngdate"] . "</td></tr>
    <tr><td>Client Address: </td><td>" . $_POST["clntaddy"] . "</td></tr>
    <tr><td>Client Phone: </td><td>" . $_POST["clntph"] . "</td></tr>
	<tr><td>Special Info: </td><td>" . $_POST["notes"] . "</td></tr>
    </table>";

    $mail->Body = $message;

    $mail->send();
    echo 'Message has been sent!';
} catch (Exception $e) {
    echo 'Message was not sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>