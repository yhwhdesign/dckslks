<?php
    $dbhost = "dclcmk.burntyokes.com";
    $dbuser = "docslocsadmin";
    $dbpass = "AdminDocsLocs";
    $dbname = "docslocsusrs";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        die ("failed to connect");
    }
?>