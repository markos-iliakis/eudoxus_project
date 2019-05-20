<?php
    session_start();
    require_once "config.php";

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $user_id = $_SESSION['user_id'];

    $new_address = $_POST['publisher_address'];
    $sql = "UPDATE publisher SET address= '$new_address' WHERE id=$user_id";

    if ($link->query($sql) === TRUE) {
        header("Location:   http://localhost/eam_project/profile.php"); /* Redirect browser */
        exit();
    }
    else {
        echo "Error updating record: " . $link->error;
    }

    $link->close();

?>
