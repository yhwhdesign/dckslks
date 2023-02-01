<?php

    function check_login($con) {
        // checks user status - logged in or not
        if(isset($_SESSION['user_id'])) {
            // checks legitamacy
            $id = $_SESSION['user_id'];
            $query = "select * from users where user_id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($reslt);
                return $user_data;
            }
        }

        // redirect to login page
        header("Location: #");
        die;

    }