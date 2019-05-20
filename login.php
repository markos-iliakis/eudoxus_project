<?php

    session_start();
    require_once 'config.php';


    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //checking values
    $email = $_POST["email"];
    $password =  $_POST["psw"];
    // echo $email;
    // echo $password;
    $result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' and password = '$password' ");
    if(mysqli_num_rows($result)==0){
        echo "Wrong username or password";
    }
    else{
        while($row = mysqli_fetch_array($result)) {
            
            echo "Welcome $row[3]\n";
            $_SESSION['user_id'] = $row[0];
            echo $_SESSION['user_id'];
            header("Location: index.php"); /* Redirect browser */
            exit();
            mysqli_close($link);
          }

    }
?>
