<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'testing@docslocsmk.burntyokes.com';             // SMTP username
    $mail->Password = 'DocsLocsAdmin1';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to
    
    if(array_key_exists('to', $_POST)) {
        $err = false;
        $msg = '';
        $email = '';

        //VALIDATION
        if (array_key_exists('subject', $_POST)) {
            $subject = substr(strip_tags($_POST['subject']), 0, 255);
        } else {
            $subject = 'No subject given';
        }

        if (array_key_exists('query', $_POST)) {
            $query = substr(strip_tags($_POST['query']), 0, 16384);
        } else {
            $query = '';
            $msg = 'No query provided';
            $err = true;
        }

        if (array_key_exists('name', $_POST)) {
            $name = substr(strip_tags($_POST['name']), 0, 255);
        } else {
            $name = '';
        }

        if (array_key_exists('to', $_POST) && in_array($_POST['to'], ['sales', 'support', 'jasen.burkett'], true)) {
            $to = $_POST['to'] . '@gmail.com';
        } else {
            $to = 'test@docslocsmk.burntyokes.com';
        }

        if (array_key_exists('email', $_POST) && PHPMailer::validateAddress($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $msg .= 'Error';
            $err = true;
        }

        if (!$err) {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'testing@docslocsmk.burntyokes.com';             // SMTP username
            $mail->Password = 'DocsLocsAdmin1';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
            $mail->Port = 465;
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            $mail->setFrom('testing@docslocsmk.burntyokes.com', (empty($name) ? 'Contact Form' : $name));
            $mail->addAddress($to);
            $mail->addReplyTo($email, $name);
            $mail->Subject = 'Contact form: ' . $subject;
            $mail->Body = "Contact form submission\n\n" . $query;
            if (!$mail->send()) {
                $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $msg .= 'Message sent!';
            }
        }
    }
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHPMailer Contact Form</title>
</head>
<body>
<h1>Contact us</h1>
<?php if (empty($msg)) { ?>
    <form method="post">
        <label for="to">Send to:</label>
        <select name="to" id="to">
            <option value="sales">Sales</option>
            <option value="support" selected="selected">Support</option>
            <option value="jasen.burkett">Test</option>
        </select><br>
        <label for="subject">Subject: <input type="text" name="subject" id="subject" maxlength="255"></label><br>
        <label for="name">Your name: <input type="text" name="name" id="name" maxlength="255"></label><br>
        <label for="email">Your email address: <input type="email" name="email" id="email" maxlength="255"></label><br>
        <label for="query">Your question:</label><br>
        <textarea cols="30" rows="8" name="query" id="query" placeholder="Your question"></textarea><br>
        <input type="submit" value="Submit">
    </form>
<?php } else {
    echo $msg;
} ?>
</body>
</html>