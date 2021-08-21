<?php
    session_start();

    // Open a new connection to the MySQL server
    // database, user, password, database name
    $mysqli = new mysqli('localhost', 'root', '', 'flowercafeandshop');

    // Connection error
    if ($mysqli -> connect_error) {
        die('Error : (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }


    // The real_escape_string function used to escape any special characters that user types in
    // Keeps website secure by preventing SQL injections

    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);


    // Validation with BCRYPT
    if (strlen($fname) < 2) {
        echo 'fname';
    } elseif (strlen($lname) < 2) {
        echo 'lname';
    } elseif (strlen($email) <=4 ) {
        echo 'eshort';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo 'eformat';
    } elseif (strlen($password) <= 4){
        echo 'pshort';
    } else {
        //Pasword ecnryption
        // The higher the cost value, the stronger the hash. However, slows down webpage and is more demanding on the server. 
        $sec_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        $query = "SELECT * FROM members WHERE email='$email'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if($num_row < 1){
            $insert_row = $mysqli->query("INSERT INTO members (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$sec_password')");

            if ($insert_row){
                $_SESSION['login'] = $mysqli->insert_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;

                echo 'true';
            }
        } else {
            echo 'false';
        }
    }



?>