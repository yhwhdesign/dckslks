<?php
    $coname = htmlspecialchars($_POST['coname']);
    $rltrname = htmlspecialchars($_POST['rltrname']);
    $rltremail = htmlspecialchars($_POST['rltremail']);
    $clntname = htmlspecialchars($_POST['clntname']);
    $clsngdate = htmlspecialchars($_POST['clsngdate']);
    $clntaddy = htmlspecialchars($_POST['clntaddy']);
    $clntph = htmlspecialchars($_POST['clntph']);
    $notes = htmlspecialchars($_POST['notes']);

    if(!empty($rltrname) && !empty($rltremail) && !empty($clntname) && !empty($clsngdate) && !empty($clntaddy) && !empty($clntph)) {
        if(filter_var($rltremail, FILTER_VALIDATE_EMAIL)) {
            $receiver = "jasen.burkett@gmail.com";
            $subject = "Docs Locs Master Key - Ft. Wayne Service Request - From: $rltrname <$rltremail>";
            $body = "Realtor Co: $coname\r\n Realtor Name: $rltrname\r\n Realtor Email: $rltremail\r\n
                Client Name: $clntname\r\n Closing Date: $clsngdate\r\n Client Address: $clntaddy\r\n
                Client Phone: $clntph\r\n Special Notes: $notes\r\n";
            $sender = "From: testing@docslocsmk.burntyokes.com";
            
            if(mail($receiver, $subject, $body, $sender)) {
                echo "Thank you, your request has been sent.";
            } else {
                echo "Please enter a valid email address!";
            }
        } else {
                echo "All fields except 'notes' are required!";
            }
    }
?>